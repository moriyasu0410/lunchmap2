#
# Cookbook Name:: timezone
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
template "/etc/sysconfig/clock" do
  owner "root"
  group "root"
  mode 0644
end

link "/etc/localtime" do
  only_if "find /etc/localtime"
  to "/usr/share/zoneinfo/Asia/Tokyo"
end
