<template>
<section class="form">
  <div class="auto-reg">
    <router-link to= "/autorization" class="autorization-title">Авторизация</router-link>
    <router-link to= "/registration" class="registration-title">Регистрация</router-link>
  </div>
  <form action="/autoriz" method="post" class="autorizat">
    <input type="hidden" name="_token" :value="codeToken">
    <input type="text" name="number" placeholder="Телефон">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" value="Войти">
  </form>
</section>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from 'axios';

export default defineComponent({
  data() {
      return {
        codeToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      };
  },
})
</script>

<style scoped>
.form{
  display: flex;
  flex-direction: column;
  gap: 36px;
  align-items: center;
  justify-content: center;
  margin: 130px auto;
}
.form .auto-reg{
  display: flex;
  gap: 79px;
  align-items: center;
}
.form .auto-reg .registration-title{
  text-decoration: none;
  color: #0F2B56;
  font-size: 24px;
}
.form .auto-reg .autorization-title{
  font-weight: bold;
  text-decoration: none;
  color: #0F2B56;
  font-size: 24px;
}
.form .autorizat{
  display: flex;
  flex-direction: column;
  gap: 19px;
  align-items: center;
}
.form .autorizat input{
  width: 567px;
  background-color: #ffffff;
  color: #7A8FAD;
  border: none;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
  border-radius: 6px;
  font-size: 20px;
  padding:14px 30px;
}
.form .autorizat input[type='submit']{
  background-color: #80B4FF;
  color: white;
  font-weight: bold;
  font-size: 20px;
  width: 256px;
  border-radius: 64px;
  margin-top: 20px;
  padding: 15px 23px;
}
</style>