- ```bash
  git init
  git remote add -f origin https://github.com/XXXXX/test.git #拉取remote的all objects信息
  git config core.sparsecheckout true   #开启sparse clone
  echo "mobile" >> .git/info/sparse-checkout   #设置需要pull的目录，*表示所有，!表示匹配相反的
  less .git/info/sparse-checkout
  git pull origin master  #拉取
  
  git remote add -f origin http://code.cemg.info/root/eshop.git
  ```

