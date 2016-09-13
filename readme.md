
###browser_xss_aduit_fuzzing  浏览器XSS 过滤器Fuzzing
---

`browser_xss_aduit_fuzzing` 使用[browser_vuln_check](https://github.com/lcatro/browser_vuln_check/blob/master/reflected_xss.html#L7) 的`<iframe>` 构建新页面环境的原理,通过随机构造生成反射型XSS 的样本组合到URL 中传递给`<iframe>` 触发XSS 过滤器的执行,如果可以成功绕过XSS 过滤器,那么URL 中的javascript 代码将会修改`browser_xss_aduit_fuzzing_sub_iframe.php` 中的`check_xss_bypass_state` 变量,在接下来页面加载完成的时候(此时注入到`body` 中的`<script>` 或者HTML 元素事件代码已经执行完成,`check_xss_bypass_state` 变量被设置为`true` )由浏览器调用`report_payload()` 方法传递当前页面的URL 和`check_xss_bypass_state` 变量的值,最后`browser_xss_aduit_fuzzing` 的`onmessage` 事件会接收到`<iframe>` 中发送过来的fuzzing 结果,通过分析`fuzzing_result.state` 判断构造的绕过方法是否有效,输出到页面中..
