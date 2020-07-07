

Centos8.0，配置SVN

https://www.jianshu.com/p/bce187974850



svn吧当前项目添加至版本机器里

1.把svn版本库中的空目录检出到www目录

\#svn --username admin --password admin456 checkout svn://192.168.1.100/svnrepos /data/www/  --no-auth-cache

2.把当前目录下的所有文件添加进版本库，

\#svn --username admin --password admin456 add ./* --no-auth-cache

3.把当前目录下的所有文件添提交到版本库，

\#svn --username admin --password admin456 commit ./* -m 'test' --no-auth-cache