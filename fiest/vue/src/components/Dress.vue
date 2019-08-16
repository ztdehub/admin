<template>
    <div>
      <div class="m_content">
<v-user></v-user>
        <div class="m_right">
          <p></p>
          <div class="mem_tit">收货地址</div>
          <div class="address">
            <div class="a_close"><a href="#"><img src="images/a_close.png" /></a></div>
            <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0" v-for="value in home">
              <tr>
                <td align="right" width="80">收货人姓名：</td>
                <td>{{value.name}}</td>
              </tr>
              <tr >
                <td align="right">配送区域：</td>
                <td >{{value.city}}</td>
              </tr>
            </table>

            <p align="right">
              <a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp;
            </p>

          </div>

          <div class="mem_tit">
            <a href="#"><img src="images/add_ad.gif" /></a>
          </div>
<!--          {{area}}-->
          <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
            <tr>
              <td width="135" align="right">配送地区</td>
              <td colspan="3" style="font-family:'宋体';">
                <select class="jj" id="count" @change="address">
                  <option value="0" selected="selected">请选择...</option>
                  <option v-for="val in area" v-bind:value="val.area_id">{{val.area_name}}</option>
                </select>
                  <select class="jj" name="province"  @change="dses" id="city">
                    <option value="0" selected="selected">请选择...</option>
                    <option v-for="value in city" v-bind:value="value.area_id">{{value.area_name}}</option>
                  </select>
                <select class="jj" name="province"   id="townt">
                    <option value="0" selected="selected">请选择...</option>
                    <option v-for="value in district" v-bind:value="value.area_id">{{value.area_name}}</option>
                  </select>
                （必填）
              </td>
            </tr>
            <tr>
              <td align="right">收货人姓名</td>
              <td style="font-family:'宋体';"><input type="text" value="姓名" class="add_ipt" />（必填）</td>
              <td align="right">电子邮箱</td>
              <td style="font-family:'宋体';"><input type="text" value="12345678@qq.com" class="add_ipt" />（必填）</td>
            </tr>
            <tr>
              <td align="right">详细地址</td>
              <td style="font-family:'宋体';"><input type="text" value="世外桃源" class="add_ipt" />（必填）</td>
              <td align="right">邮政编码</td>
              <td style="font-family:'宋体';"><input type="text" value="610000" class="add_ipt" /></td>
            </tr>
            <tr>
              <td align="right">手机</td>
              <td style="font-family:'宋体';"><input type="text" value="1361234587" class="add_ipt" />（必填）</td>
              <td align="right">电话</td>
              <td style="font-family:'宋体';"><input type="text" value="028-12345678" class="add_ipt" /></td>
            </tr>
            <tr>
              <td align="right">标志建筑</td>
              <td style="font-family:'宋体';"><input type="text" value="世外桃源大酒店" class="add_ipt" /></td>
              <td align="right">最佳送货时间</td>
              <td style="font-family:'宋体';"><input type="text" value="" class="add_ipt" /></td>
            </tr>
          </table>
          <p align="right">
            <a href="#">删除</a>&nbsp; &nbsp; <a class="add_b" @click="add">确认修改</a>
          </p>
        </div>
      </div>
      <!--End 用户中心 End-->
      <!--Begin Footer Begin -->
      <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
          <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
              <td width="72"><img src="images/b1.png" width="62" height="62" /></td>
              <td><h2>正品保障</h2>正品行货  放心购买</td>
            </tr>
          </table>
          <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
              <td width="72"><img src="images/b2.png" width="62" height="62" /></td>
              <td><h2>满38包邮</h2>满38包邮 免运费</td>
            </tr>
          </table>
          <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
              <td width="72"><img src="images/b3.png" width="62" height="62" /></td>
              <td><h2>天天低价</h2>天天低价 畅选无忧</td>
            </tr>
          </table>
          <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
              <td width="72"><img src="images/b4.png" width="62" height="62" /></td>
              <td><h2>准时送达</h2>收货时间由你做主</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="b_nav">
        <dl>
          <dt><a href="#">新手上路</a></dt>
          <dd><a href="#">售后流程</a></dd>
          <dd><a href="#">购物流程</a></dd>
          <dd><a href="#">订购方式</a></dd>
          <dd><a href="#">隐私声明</a></dd>
          <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
          <dt><a href="#">配送与支付</a></dt>
          <dd><a href="#">货到付款区域</a></dd>
          <dd><a href="#">配送支付查询</a></dd>
          <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
          <dt><a href="#">会员中心</a></dt>
          <dd><a href="#">资金管理</a></dd>
          <dd><a href="#">我的收藏</a></dd>
          <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
          <dt><a href="#">服务保证</a></dt>
          <dd><a href="#">退换货原则</a></dd>
          <dd><a href="#">售后服务保证</a></dd>
          <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
          <dt><a href="#">联系我们</a></dt>
          <dd><a href="#">网站故障报告</a></dd>
          <dd><a href="#">购物咨询</a></dd>
          <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
          <a href="#" class="b_sh1">新浪微博</a>
          <a href="#" class="b_sh2">腾讯微博</a>
          <p>
            服务热线：<br />
            <span>400-123-4567</span>
          </p>
        </div>
        <div class="b_er">
          <div class="b_er_c"><img src="images/er.gif" width="118" height="118" /></div>
          <img src="images/ss.png" />
        </div>
      </div>
      <div class="btmbg">
        <div class="btm">
          备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
          <img src="images/b_1.gif" width="98" height="33" /><img src="images/b_2.gif" width="98" height="33" /><img src="images/b_3.gif" width="98" height="33" /><img src="images/b_4.gif" width="98" height="33" /><img src="images/b_5.gif" width="98" height="33" /><img src="images/b_6.gif" width="98" height="33" />
        </div>
      </div>
      <!--End Footer End -->
    </div>

  </div>
</template>

<script>
import User from './user/user'
export default {
  data() {
    return {
      area: '',
      prov:'',
      city:[],
      district: [],
      towns : [],
      cityadd : '',
      home :''
    }
  },
  components:{
    'v-user':User
  },
  mounted () {
    axios.post(this.url+'/area', {
      token: localStorage.getItem("name"),
    })
      .then(response => {
        this.area = response.data
      }),
      axios.post(this.url+'/citysel', {
        token: localStorage.getItem("name"),
      })
        .then(response => {
          this.home=response.data
        })
  },
  methods : {
    address () {
      var id=$('#count option:selected') .val()
      axios.post(this.url+'/city', {
        token: localStorage.getItem("name"),
        id:id
      })
        .then(response => {
          this.city = response.data
        })
    },
    dses () {
      var id=$('#city option:selected').val()
      axios.post(this.url+'/city', {
        token: localStorage.getItem("name"),
        id:id
      })
        .then(response => {
          this.district = response.data
        })
    },
    add(){
      var province=$('#count option:selected').html()
      console.log(province)
      var city=$('#city option:selected').html()
      var town=$('#townt option:selected').html()
      var address=province+"省"+city+"市"+town
      this.cityadd=address
      axios.post(this.url+'/cityadd', {
        token: localStorage.getItem("name"),
        city:this.cityadd
      })
        .then(response => {
          console.log(response)
          alert("添加成功")
          axios.post(this.url+'/citysel', {
            token: localStorage.getItem("name"),
          })
            .then(response => {
              this.home=response.data
            })
        })
    }
  }
}
</script>

<style scoped>

</style>
