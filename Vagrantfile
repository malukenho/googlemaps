# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant::Config.run do |config|
  config.vm.box = "phpdevbox"
  config.vm.network :hostonly, "192.168.33.10"

  config.vm.forward_port 80, 8099       #apache
  config.vm.forward_port 81, 8909       #nginx
  config.vm.forward_port 27017, 27034   #mongodb
  config.vm.forward_port 3306, 3307     #mysql

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "puppet/manifests"
    puppet.module_path = "puppet/modules"
    puppet.options = ['--verbose']
  end

  config.vm.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
end
