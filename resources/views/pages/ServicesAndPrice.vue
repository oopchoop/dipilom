<template>
  <section class="price-service">
    <h1>Услуги и цены</h1>
    <div class="list">
      <div class="list-services">
        <p class="service">Первичный прием терапевта</p>
        <p class="service">Повторный прием терапевта</p>
        <p class="service">Первичный прием гинеколога</p>
        <p class="service">Повторный прием гинеколога</p>
        <p class="service">Первичный прием кардиолога</p>
        <p class="service">Повторный прием кардиолога</p>
        <p class="service">Первичный прием гастроэнтеролога</p>
        <p class="service">Повторный прием гастроэнтеролога</p>
        <p class="service">Первичный прием хирурга</p>
        <p class="service">Повторный прием хирурга</p>
        <p class="service">Первичный прием вирусолога</p>
        <p class="service">Повторный прием вирусолога</p>
      </div>
      <div class="list-price">
        <p class="price">1000</p>
        <p class="price">850</p>
        <p class="price">1500</p>
        <p class="price">1250</p>
        <p class="price">1300</p>
        <p class="price">1000</p>
        <p class="price">1000</p>
        <p class="price">850</p>
        <p class="price">1500</p>
        <p class="price">1300</p>
        <p class="price">1700</p>
        <p class="price">1400</p>
      </div>
    </div>

    <p class="ps">Дополнительные услуги и цены можно узнать по телефону +7(351) 255-25-25</p>
  </section>
</template>

<script lang="ts">

</script>

<style scoped>
.price-service{
  width: 1440px;
  margin: 72px auto 0 auto;
}
.price-service h1{
  font-size: 28px;
  color: #0F2B56;
}
.price-service .list{
  margin-top: 42px;
  display: flex;
  align-items: center;
  gap: 40px;
  font-size: 18px;
}
.price-service .list .list-services{
  display: flex;
  flex-direction: column;
  color: #0F2B56;
  gap: 15px;
}
.price-service .list .list-price{
  display: flex;
  flex-direction: column;
  color: #216AD2;
  font-weight: 500;
  gap: 15px;
}
.price-service .list p{
  margin: 0;
}
.price-service .ps{
  color: #216AD2;
  margin-top: 40px;
  font-size: 16px;
}
</style>