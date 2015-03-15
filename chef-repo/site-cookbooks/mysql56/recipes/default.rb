#
# Cookbook Name:: mysql56
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
package 'mysql-libs' do
  action :remove
end

%w{mysql-community-server mysql-community-client mysql-community-common mysql-community-devel}.each do |p|
  package p do
    action :install
    end
end
