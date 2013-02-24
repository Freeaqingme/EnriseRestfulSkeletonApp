Vagrant::Config.run do |config|
    config.vm.box = 'precise64'
    config.vm.box_url = 'http://files.vagrantup.com/precise64.box'

    config.vm.host_name = "houdini.dev"
    config.vm.network :hostonly, "192.168.56.200"
    config.vm.customize [
        'modifyvm', :id,
        '--chipset', 'ich9', # solves kernel panic issue on some host machines
        '--memory', '386', # set memory
    ]
#    config .vm.share_folder("v-root", "/vagrant", ".", :extra => 'uid=1000,gid=48,dmode=0664,fmode=0764')

    config.vm.provision :shell, :path => "dev/puppet/init.sh"

    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = "dev/puppet/manifests"
        puppet.module_path = "dev/puppet/modules"
        puppet.manifest_file = "manifest.pp"
        puppet.options = [
            '--fileserverconfig', '/vagrant/dev/puppet/fileserver.conf',
            '--verbose',
            '--debug',
            '--user', 'puppet',
            '--no-daemonize',
        ]
    end

end
