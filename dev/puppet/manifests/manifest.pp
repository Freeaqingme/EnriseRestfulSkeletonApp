# Todo adding of zendserver application
# Todo p5 tunnel
# Patchdb

node default {

    # Set default path for Exec calls
    Exec {
        path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ]
    }

    class { "zendserver":
        version       => 6.0,
        php_version   => 5.4,
        firewall      => false,
    }

    ->

    class { "apache": }

    ->

    augeas { 'set-php-ini-values':
        context => '/files/usr/local/zend/etc/php.ini',
        changes => [
            'set PHP/error_reporting "E_ALL|E_STRICT"',
            'set PHP/display_errors On',
            'set PHP/display_startup_errors On',
            'set PHP/html_errors On',
            'set PHP/expose_php Off',
            'set PHP/short_open_tag Off',
            'set PHP/date.timezone Europe/Amsterdam',
        ],
    }


    class { "mariadb":
        mariadb_version => 10.0
    }

    package { [ "screen", "vim", "bash-completion", "elinks", "lynx", "nano",
                "sl", "tree", "git", "curl", "php-5.4-curl-zend-server",  ] :
        ensure => installed,
        require => Class['zendserver'],
    }


    php::pear::config { "auto_discover":
      value => 1,
    }

    ->

     php::pear::module { "pear.phpunit.de/PHPUnit":
      use_package   => no,
      alldeps       => true,
    }


    # This should be refactored to use zend server applications
    apache::vhost { 'default':
        docroot             => '/srv/http/houdini/dev/releases/houdini.dev/public',
        server_name         => 'houdini.dev',
        priority            => '',
        template            => 'apache/virtualhost/vhost.conf.erb',
    }

    file { ["/srv",
            "/srv/http",
            "/srv/http/houdini",
            "/srv/http/houdini/dev",
            "/srv/http/houdini/dev/releases/"]:
        ensure => directory,
    }

    file { "/srv/http/houdini/dev/releases/houdini.dev":
        ensure => link,
        target => "/vagrant",
        force  => true,
        require => File[ "/srv/http/houdini/dev/releases/"],

    }

    user { "enrise":
        groups => ['sudo'],
        managehome => true,
        comment => 'User managed by Puppet',
        shell    => '/bin/bash',
    }

    ->

    file { "enrise_ssh":
      ensure   => directory,
      path     => "/home/enrise/.ssh",
      owner    => 'enrise',
      group    => 'enrise',
    }

    ->

    file { "enrise_ssh_keys":
      ensure   => present,
      path     => "/home/enrise/.ssh/authorized_keys2",
      owner    => 'enrise',
      group    => 'enrise',
      mode     => '0600',
      source   => 'puppet:///files/authorized_keys',
    }


    file { '/root/puppet-mysql':
      ensure => directory
    }

    ->

    mysql::query { 'create_db':
        mysql_db => '',
        mysql_query => "CREATE DATABASE IF NOT EXISTS houdini_main",
        require => Class["mariadb"],
    }


    file { "/var/log/houdini.log":
            ensure => present,
            owner  => 'www-data',
            group  => 'enrise',
            require => User['enrise'],
        }

    class { "ntp": }

    class { "timezone":
        timezone => "Europe/Amsterdam",
    }
}
