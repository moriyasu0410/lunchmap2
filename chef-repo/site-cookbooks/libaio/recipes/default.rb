#
# Cookbook Name:: libaio
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
%w{libaio libaio-devel}.each do |p|
  package p do
    action :install
  end
end
