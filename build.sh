#!/usr/bin
p=$(cd `dirname $0`;pwd)
os=$(uname)

output="$p/output"
thrift="$p/thrift"

rm -rf $output/*

mkdir -p $output/php $output/go/ 

#编译
thrift -r --gen go $thrift/Service.thrift
thrift -r --gen php:server $thrift/Service.thrift

echo "done";