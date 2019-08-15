<template>
  <div id="div">
    <div v-for="(value, name, index) in msg">
      {{ index }}. {{ name }}: {{ value }}
    </div>
  </div>
</template>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg:[]
    }
  },
  mounted () {
    axios.get('http://localhost/laravel/blog/public/shop')
      .then(response => (this.msg = response.data))
      .catch(function (error) {
        console.log(error)
      })
  }
}
// 为给定 ID 的 user 创建请求
</script>
<style scoped>
  h3 {
    display: inline-block;
    margin: 0 10px;
    color: skyblue;
  }
</style>
