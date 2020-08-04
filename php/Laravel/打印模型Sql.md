```
DB::connection()->enableQueryLog();
模型操作...
$log = DB::getQueryLog();
dd($log[0]['query']); // 0代表第1條Sql
```

