#
# Cookbook Name:: php55
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
%w{php php-opcache php-devel php-mbstring php-mysql php-mcrypt php-pecl-memcached php-pecl-xdebug}.each do |p|
  package p do
    action :install
      options "--enablerepo=remi --enablerepo=remi-php55"
    end
end
