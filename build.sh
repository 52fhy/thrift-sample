#!/usr/bin
p=$(cd `dirname $0`;pwd)
os=$(uname)

output="$p/output"
thrift="$p/thrift"

rm -rf $output/*

mkdir -p $output/php $output/go/ 

#编译
thrift -r --gen go $thrift/Sample.thrift
thrift -r --gen php $thrift/Sample.thrift

echo "done";