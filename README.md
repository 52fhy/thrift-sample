Linux需要先安装http://thrift.apache.org/docs/install/centos

Bison：
``` bash
wget http://ftp.gnu.org/gnu/bison/bison-2.5.1.tar.gz
tar xvf bison-2.5.1.tar.gz
cd bison-2.5.1
./configure --prefix=/usr
make
sudo make install
cd ..
```

如果是Mac，先查看安装的版本：
```
$ bison -V
```
然后查看所在位置：
```
$ which bison
/usr/local/bin/bison
```
查看安装的版本：
```
$ brew list bison
/usr/local/Cellar/bison/3.4.1/bin/bison
/usr/local/Cellar/bison/3.4.1/bin/yacc
/usr/local/Cellar/bison/3.4.1/lib/liby.a
/usr/local/Cellar/bison/3.4.1/share/aclocal/bison-i18n.m4
/usr/local/Cellar/bison/3.4.1/share/bison/ (28 files)
/usr/local/Cellar/bison/3.4.1/share/doc/ (42 files)
/usr/local/Cellar/bison/3.4.1/share/info/bison.info
/usr/local/Cellar/bison/3.4.1/share/man/ (2 files)
```
替换掉：
```
mv /usr/local/bin/bison  /usr/local/bin/bison.bak
cp  /usr/local/bin/bison
```

``` bash
wget http://mirrors.tuna.tsinghua.edu.cn/apache/thrift/0.12.0/thrift-0.12.0.tar.gz
tar zxvf thrift-0.12.0.tar.gz
cd thrift-0.12.0
./configure
make && make install 
```

## 常见问题
1、 configure: error: Bison version 2.5 or higher
重新安装Bison bison-2.5.1。见上文。