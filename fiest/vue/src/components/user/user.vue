<template>
  <div class="m_left">
    <div class="left_n">管理中心</div>
    <div class="left_m">
      <div class="left_m_t t_bg1">订单中心</div>
      <ul>
        <li> <router-link  to="/User"><a>我的订单</a></router-link></li>
        <li> <router-link  to="/Dress"><a>收货地址</a></router-link></li>
        <li><a href="#">缺货登记</a></li>
        <li><a href="#">跟踪订单</a></li>
      </ul>
    </div>
    <div class="left_m">
      <div class="left_m_t t_bg2">会员中心</div>
      <ul>
        <li> <router-link  to="/user"><a>用户信息</a></router-link></li>
        <li><a>我的收藏</a></li>
        <li><a >我的留言</a></li>
        <li><a >推广链接</a></li>
        <li><a href="#">我的评论</a></li>
      </ul>
    </div>
    <div class="left_m">
      <div class="left_m_t t_bg3">账户中心</div>
      <ul>
        <li><a>账户安全</a></li>
        <li><a>我的红包</a></li>
        <li><a>资金管理</a></li>
      </ul>
    </div>
    <div class="left_m">
      <div class="left_m_t t_bg4">分销中心</div>
      <ul>
        <li><a>我的会员</a></li>
        <li><a>我的业绩</a></li>
        <li><a>我的佣金</a></li>
        <li><a>申请提现</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
    export default {
        name: "user.vue"
    }
</script>

<style scoped>

</style>
