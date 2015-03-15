#
# Cookbook Name:: apache
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
service "httpd" do
  supports :status => true, :restart => true, :reload => true
  action [:enable, :start]
end

template "/etc/httpd/conf.d/lunchmap2.conf" do
  owner "apache"
  group "apache"
  mode  '0644'
  notifies :reload, 'service[httpd]'
end
