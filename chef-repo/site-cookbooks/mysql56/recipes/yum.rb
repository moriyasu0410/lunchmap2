#
# Cookbook Name:: mysql56
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
remote_file "/tmp/#{node['mysql']['yum_file_name']}" do
  source "#{node['mysql']['yum_remote_uri']}"
  not_if { ::File.exists?("/tmp/#{node['mysql']['yum_file_name']}") }
end

package node['mysql']['yum_file_name'] do
  action :install
  provider Chef::Provider::Package::Rpm
  source "/tmp/#{node['mysql']['yum_file_name']}"
end
