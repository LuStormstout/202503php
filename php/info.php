<?php

echo "<div style='text-align: center; background-color: #808080; padding: 20px;'>";
echo "当前文件路径是: " . __DIR__ . "<br>";
echo "当前文件是: " . __FILE__ . "<br>";
echo "This is Docker PHP info page";
echo "<br>";
echo "Current time: " . date('Y-m-d H:i:s');
echo "</div>";

phpinfo();