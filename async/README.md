# Asynchronous in PHP

Implement Asynchronous in PHP.

## Examples

### Delete files in sync

```shell
php src/spatie_async/delete_files_sync.php
```

Result

```
[Delete files non concurrent] Start at: 3:49:28pm
[Delete files non concurrent] Execution time of script = 100.00814199448 sec
[Delete files non concurrent] Finish at: 3:51:08pm
```

### Delete files in Async

```shell
php src/spatie_async/delete_files_async.php
```

Result

```
Deleted file: tmp/test2.txt
Deleted file: tmp/test1.txt
Deleted file: tmp/test6.txt
Deleted file: tmp/test4.txt
Deleted file: tmp/test5.txt
Deleted file: tmp/test3.txt
Deleted file: tmp/test7.txt
Deleted file: tmp/test8.txt
Deleted file: tmp/test9.txt

Execution time of script = 10.071274995804 sec
```

### Write files in Async

```shell
php src/spatie_async/write_files_async.php
```

```
Generated file: tmp/file_1.txt
Generated file: tmp/file_2.txt
Generated file: tmp/file_3.txt
Generated file: tmp/file_4.txt
Generated file: tmp/file_5.txt
Generated file: tmp/file_6.txt
Generated file: tmp/file_8.txt
Generated file: tmp/file_10.txt
Generated file: tmp/file_7.txt
Generated file: tmp/file_9.txt

Execution time of script = 0.081786870956421 sec
```

