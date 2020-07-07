[来源](https://zhuanlan.zhihu.com/p/137015279)

```
-- 优化前SQL
SELECT  各种字段
FROM `table_name`
WHERE 各种条件
LIMIT 0,10;
```

> **操作：** 查询条件放到子查询中，子查询只查主键ID，然后使用子查询中确定的主键关联查询其他的属性字段；
> **原理：** 减少回表操作；

```
-- 优化后SQL
SELECT  各种字段
FROM `table_name` main_tale
RIGHT JOIN 
(
SELECT  子查询只查主键
FROM `table_name`
WHERE 各种条件
LIMIT 0,10;
) temp_table ON temp_table.主键 = main_table.主键
```



