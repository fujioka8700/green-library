<template>
  <div>
    <div>
      Plant Detail
    </div>
    <div>
      <table class="table">
        <tbody>
          <tr>
            <th scope="row">植物名</th>
            <td>アネモネ・パルマータ</td>
          </tr>
          <tr>
            <th scope="row">学名</th>
            <td>Anemone palmata</td>
          </tr>
          <tr>
            <th scope="row">科名</th>
            <td>キンポウゲ科</td>
          </tr>
          <tr>
            <th scope="row">属名</th>
            <td>イチリンソウ属</td>
          </tr>
          <tr>
            <th scope="row">原産地</th>
            <td>ヨーロッパ</td>
          </tr>
        </tbody>
      </table>
      <h2>アネモネ・パルマータの特徴</h2>
      <p>
        アネモネ・パルマータは、キンポウゲ科の原種のアネモネのひとつです。アネモネというと球根の花が一般的ですが、パルマータは宿根草です。宿根草タイプのアネモネの中では小型で、かわいらしいサイズです。
        花の咲く時期以外は下葉のみ、春になると株元から花茎が立ち上がり、晩春から初夏にクリームイエローの花が開花します。咲き始めはクリームイエロー、開くとクリーム色になり、華やかな色合いのアネモネの中では素朴な印象です。花後の種が入る実は、まん丸でかわいい形をしていて観賞価値があります。
        酷暑と表現される最近の夏を越せることができれば、基本的には植えっぱなしにできる宿根草です。
      </p>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      id: {
        type: String,
        required: true,
      },
    },
  }

</script>
