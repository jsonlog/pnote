<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Vue 测试实例 - 菜鸟教程(runoob.com)</title>
    <!-- <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script> <!-- /dist/vue.js -->
</head>
<style>
.class1{
  background: #444;
  color: #eee;
}
</style>

<body>
    <div id="vue_det">
        <h1>site : {{site}}</h1>
        <h1>url : {{url}}</h1>
        <h1>{{details()}}</h1>
        <h1>Alexa : {{alexa}}</h1>
    </div>
    <div id="app">
        <div v-html="messagehtml"></div>
        <label for="r1">修改颜色</label><input type="checkbox" v-model="use" id="r1">

        <br><br>
        <div v-bind:class="{'class1': use}">
            v-bind:class 指令
        </div>
        {{5+5}}<br>
        {{ ok ? 'YES' : 'NO' }}<br>
        {{ message.split('').reverse().join('') }}
        <input v-model="message"/>
        <button v-on:click="reverseMessage">反转字符串</button>
        <button @click="reverseMessage">反转字符串</button>
        {{ message | capitalize }}
        <div v-bind:id="'list-' + id">菜鸟教程</div>
        <p v-if="seen">现在你看到我了</p>
        <h1 v-show="ok">Hello!</h1>
        <template v-if="ok">
        <h1>菜鸟教程</h1>
        <p>学的不仅是技术，更是梦想！</p>
        <p>哈哈哈，打字辛苦啊！！！</p>
        </template>
        <div v-if="Math.random() > 0.5">
            Sorry
        </div>
        <div v-else>
            Not sorry
        </div>
        <div v-if="type === 'A'">
            A
        </div>
        <div v-else-if="type === 'B'">
            B
        </div>
        <div v-else-if="type === 'C'">
            C
        </div>
        <div v-else>
            Not A/B/C
        </div>


        <pre><a v-bind:href="url">菜鸟教程</a></pre>
        <pre><a :href="url"></a></pre>

        <ol>
            <li v-for="site in sites">
                {{ site.name }}
            </li>
        </ol>
        <template v-for="site in sites">
            <li>{{ site.name }}</li>
            <li>--------------</li>
        </template>
        <ul>
            <li v-for="value in object">
            {{ value }}
            </li>
        </ul>
        <ul>
            <li v-for="(value, key, index) in object">
                {{ index }}. {{ key }} : {{ value }}
            </li>
        </ul>
        <ul>
            <li v-for="n in 10">
                {{ n }}
            </li>
        </ul>
        {{ message.split('').reverse().join('') }}
        <p>原始字符串: {{ message }}</p>
        <p>计算后反转字符串: {{ reversedMessage }}</p>

        <p style="font-size:25px;">计数器: {{ counter }}</p>
        <button @click="counter++" style="font-size:25px;">点我</button>
           <!-- `greet` 是在下面定义的方法名 -->
        <button v-on:click="greet">Greet</button>
        <button v-on:click="say('hi')">Say hi</button>
        <button v-on:click="say('what')">Say what</button>
        <!-- 阻止单击事件冒泡 -->
        <a v-on:click.stop="doThis"></a>
        <!-- 提交事件不再重载页面 -->
        <form v-on:submit.prevent="onSubmit"></form>
        <!-- 修饰符可以串联  -->
        <a v-on:click.stop.prevent="doThat"></a>
        <!-- 只有修饰符 -->
        <form v-on:submit.prevent></form>
        <!-- 添加事件侦听器时使用事件捕获模式 -->
        <div v-on:click.capture="doThis">...</div>
        <!-- 只当事件在该元素本身（而不是子元素）触发时触发回调 -->
        <div v-on:click.self="doThat">...</div>

        <!-- click 事件只能点击一次，2.1.4版本新增 -->
        <a v-on:click.once="doThis"></a>

        <!-- 只有在 keyCode 是 13 时调用 vm.submit() -->
        <input v-on:keyup.13="submit" />
        <!--
        全部的按键别名：

            .enter
            .tab
            .delete (捕获 "删除" 和 "退格" 键)
            .esc
            .space
            .up
            .down
            .left
            .right
            .ctrl
            .alt
            .shift
            .meta
         -->
        <!-- 在 "change" 而不是 "input" 事件中更新 -->
        <!-- <input v-model.lazy="msg" > -->

        <!-- 自动将用户的输入值转为 Number 类型（如果原值的转换结果为 NaN 则返回原值） -->
        <!-- <input v-model.number="age" type="number"> -->

        <!-- 自动过滤用户输入的首尾空格 -->
        <!-- <input v-model.trim="msg"> -->
        <runoob></runoob>
        <p>页面载入时，input 元素自动获取焦点：</p>
        <input v-focus>
        <br><br>
        <button v-on:click = "show = !show">点我</button>
        <transition name = "fade">
            <p v-show = "show" v-bind:style = "styleobj">动画实例</p>
        </transition>
        <transition name="slide-fade">
            <p v-if="show">菜鸟教程</p>
        </transition>


    </div>
    <div id="computed_props">
        千米 : <input type="text" v-model="kilometers">
        米 : <input type="text" v-model="meters">
    </div>
    <p id="info"></p>

    <script type="text/javascript">
        // 注册
        Vue.component('runoob', {
          template: '<h1>自定义组件!</h1>'
        })
        // 注册一个全局自定义指令 v-focus
        Vue.directive('focus', {
            // 当绑定元素插入到 DOM 中。
            inserted: function (el) {
                // 聚焦元素
                el.focus()
            }
        })
        var vm = new Vue({
                el: '#app',
                data: {
                    messagehtml: '<h1>菜鸟教程</h1>',
                    use: false,
                    ok: true,
                    seen: true,
                    message: 'runoob',
                    id: 1,
                    url: 'http://www.runoob.com',
                    type: 'C',
                    sites: [
                        { name: 'Runoob' },
                        { name: 'Google' },
                        { name: 'Taobao' }
                    ],
                    object: {
                        name: '菜鸟教程',
                        url: 'http://www.runoob.com',
                        slogan: '学的不仅是技术，更是梦想！'
                    },
                    counter: 1,
                    name: 'Vue.js',
                    show:true,
                    styleobj :{
                        fontSize:'30px',
                        color:'red'
                    }
                }, methods: {
                    reverseMessage: function () {
                        this.message = this.message.split('').reverse().join('')
                    },
                    greet: function (event) {
                        // `this` 在方法里指当前 Vue 实例
                        alert('Hello ' + this.name + '!')
                        // `event` 是原生 DOM 事件
                        if (event) {
                            alert(event.target.tagName)
                        }
                    },
                    say: function (message) {
                        alert(message)
                    }
                },
                filters: {
                    capitalize: function (value) {
                        if (!value) return ''
                        value = value.toString()
                        return value.charAt(0).toUpperCase() + value.slice(1)
                    }
                },
                computed: {
                    // 计算属性的 getter
                    reversedMessage: function () {
                        // `this` 指向 vmd 实例
                        return this.message.split('').reverse().join('-')
                    }
                }
            })
            // 也可以用 JavaScript 直接调用方法
            //app.greet() // -> 'Hello Vue.js!'

        vm.$watch('counter', function (nval, oval) {
                alert('计数器值的变化 :' + oval + ' 变为 ' + nval + '!');
            });
        // 我们的数据对象
        var data = { site: "菜鸟教程0", url: "www.runoob.com0", alexa: 100000 }
        var vmd = new Vue({
            el: '#vue_det',
            data: data
        })
        // 它们引用相同的对象！
        document.write(vmd.site === data.site) // true
        document.write("<br>")
        // 设置属性也会影响到原始数据
        vmd.site = "Runoob"
        document.write(data.site + "<br>") // Runoob

        // ……反之亦然
        data.alexa = 1234
        document.write(vmd.alexa) // 1234

        document.write("<br>")
        document.write(vmd.$data === data) // true
        document.write("<br>")
        document.write(vmd.$el === document.getElementById('vue_det')) // true
        document.write('<br>');


    var vmc = new Vue({
        el: '#vue_det',
        data: {
            // site: "菜鸟教程",
            // alexa: "10000",
            name: 'Google',
            url: 'http://www.google.com'
        },
        methods: {
            details: function () {
                return this.site + " - 学的不仅是技术，更是梦想";
            }
        },
        computed: {
            site: {
                // getter
                get: function () {
                    return this.name + ' ' + this.url
                },
                // setter
                set: function (newValue) {
                    var names = newValue.split(' ')
                    this.name = names[0]
                    this.url = names[names.length - 1]
                }
            }
        }
    })

    // 调用 setter， vmc.name 和 vmc.url 也会被对应更新
    vmc.site = '菜鸟教程 http://www.runoob.com';
    document.write('name: ' + vmc.name);
    document.write('<br>');
    document.write('url: ' + vmc.url);
    document.write('<br>');

    var vmw = new Vue({
            el: '#computed_props',
            data: {
                kilometers: 0,
                meters: 0
            },
            watch: {
                kilometers: function (val) {
                    this.kilometers = val;
                    this.meters = this.kilometers * 1000
                },
                meters: function (val) {
                    this.kilometers = val / 1000;
                    this.meters = val;
                }
            }
        });
        // $watch 是一个实例方法
        vmw.$watch('kilometers', function (newValue, oldValue) {
            // 这个回调将在 vm.kilometers 改变后调用
            document.getElementById("info").innerHTML = "修改前值为: " + oldValue + "，修改后值为: " + newValue;
        })
    </script>
</body>

</html>