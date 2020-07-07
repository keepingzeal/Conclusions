1. #### 【1】【2】可调换查看顺序

2. #### sudo -u root ssh-keygen -t rsa -C 'keepingzeal@163.com'

   1. 在本地生成key
   2. ![image-20200706170253164](C:\Users\KZEAL\AppData\Roaming\Typora\typora-user-images\image-20200706170253164.png)

3. #### ls -al ~/.ssh

   1. 查看生成成功
   2. ![image-20200706170424256](C:\Users\KZEAL\AppData\Roaming\Typora\typora-user-images\image-20200706170424256.png)

4. #### 查看生成的key：cat ~/.ssh/id_rsa.pub

5. #### 配置github SSH

   1. ![image-20200706173418682](C:\Users\KZEAL\AppData\Roaming\Typora\typora-user-images\image-20200706173418682.png)

6. #### 请求尝试是否配置成功  ssh -T git@github.com

   1. ![image-20200706173506208](C:\Users\KZEAL\AppData\Roaming\Typora\typora-user-images\image-20200706173506208.png)

7. #### 常见问题

   1. 配置好后，仍需输入用户名与密码
      1. git remote -v
      2. git remote set-url origin 【ssh地址】

