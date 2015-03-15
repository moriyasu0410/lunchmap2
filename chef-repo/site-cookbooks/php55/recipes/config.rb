#
# Cookbook Name:: php55
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
template "/etc/php.ini" do
  owner "root"
  group "root"
  notifies :reload,'service[httpd]'
end
