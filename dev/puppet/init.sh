#!/bin/sh

echo "Upgrading puppet to latest version. Minimally version 3.0..."

wget http://apt.puppetlabs.com/puppetlabs-release-precise.deb -qq &> /dev/null
sudo dpkg -qq -i puppetlabs-release-precise.deb  &> /dev/null
rm puppetlabs-release-precise.deb &> /dev/null
sudo apt-get update -qq &> /dev/null
sudo apt-get install -qqy puppet  &> /dev/null
