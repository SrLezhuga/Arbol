<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Inicio</title>
</head>

<body>
  <canvas id="canvas" width="800" height="800"></canvas>
  <input type="range" class="form-range" min="1" max="72" step="1" value="1" id="slider">
  <script>
    const slider = document.querySelector('#slider')
    const canvas = document.querySelector('#canvas')
    slider.addEventListener('input', handleInputSlider)
    const ctx = canvas.getContext('2d')
    const images = []
    const url = []
    window.addEventListener('load', pageLoaded)

    url[1] = "https://digital-assets.opticatonline.com/images/800/496207d1df386913ba4c3dae055967bc8f499348.jpg";
    url[2] = "https://digital-assets.opticatonline.com/images/800/9bd603920e2a508012ccccb686252244e89d1e1c.jpg";
    url[3] = "https://digital-assets.opticatonline.com/images/800/cde55045c9082b22e0e22fad2e5ec6e30278ed9e.jpg";
    url[4] = "https://digital-assets.opticatonline.com/images/800/8f0c3eca345d98d9ec71bd7685081394e2906bd9.jpg";
    url[5] = "https://digital-assets.opticatonline.com/images/800/1cd559eb53c46e17d8c2d695822268690dcc4b77.jpg";
    url[6] = "https://digital-assets.opticatonline.com/images/800/f6f0d936fef4dbcacd39a6486ff548f8d9459e64.jpg";
    url[7] = "https://digital-assets.opticatonline.com/images/800/6204c69058d7c412879ae26ec730783610758246.jpg";
    url[8] = "https://digital-assets.opticatonline.com/images/800/bd7c7f73642a81542341637c935676f60570900b.jpg";
    url[9] = "https://digital-assets.opticatonline.com/images/800/2006c3c35709942e57216fd9acada07617dfc366.jpg";
    url[10] = "https://digital-assets.opticatonline.com/images/800/44aec9aa40d3057425ee744bba774d46b537bed6.jpg";
    url[11] = "https://digital-assets.opticatonline.com/images/800/61575b64d1ad4afb8104c2d2e626f309e45d7344.jpg";
    url[12] = "https://digital-assets.opticatonline.com/images/800/28653f5c3fd917351e63b40ec158dca76536c9d0.jpg";
    url[13] = "https://digital-assets.opticatonline.com/images/800/a8418e224abc300b94aafa4c74927230b10c6aea.jpg";
    url[14] = "https://digital-assets.opticatonline.com/images/800/97a469b5730fbe4b56ce15a59a85088dd8f31815.jpg";
    url[15] = "https://digital-assets.opticatonline.com/images/800/f0048abf9ee7fb0fe8b3deecbd975429fd9dfe96.jpg";
    url[16] = "https://digital-assets.opticatonline.com/images/800/cce7ea0cf2eb733369edb22996fe4858cd946fd4.jpg";
    url[17] = "https://digital-assets.opticatonline.com/images/800/371c76fe2b953894b39ed5e99076ebc132041e3a.jpg";
    url[18] = "https://digital-assets.opticatonline.com/images/800/f0393f9857b8dd5a0d18ef40a739f48bf2522ee4.jpg";
    url[19] = "https://digital-assets.opticatonline.com/images/800/7edacfd47b6d9c2e88af23918089c5dc951d1070.jpg";
    url[20] = "https://digital-assets.opticatonline.com/images/800/4948fe0168a10c8de6363807ef394196ef1375bb.jpg";
    url[21] = "https://digital-assets.opticatonline.com/images/800/ca4b2f29cc67ddd4d5ee41343466ddcc1bb595fb.jpg";
    url[22] = "https://digital-assets.opticatonline.com/images/800/9c17bfa761a379c5c4013237cafaf602bf08d722.jpg";
    url[23] = "https://digital-assets.opticatonline.com/images/800/067bde90b5cf20eefab22482f7bee6317c2b7ff0.jpg";
    url[24] = "https://digital-assets.opticatonline.com/images/800/02ea9174cdfe5a5c95e9a30f328a4faa9779c4ca.jpg";
    url[25] = "https://digital-assets.opticatonline.com/images/800/d776b445fad6d2fa1e3db253af5d10e4939fd791.jpg";
    url[26] = "https://digital-assets.opticatonline.com/images/800/cd13e786b8c234f2bef0f266b61760cba77e2813.jpg";
    url[27] = "https://digital-assets.opticatonline.com/images/800/b165022633fa2cf31b84399d49ac5ba83533c39a.jpg";
    url[28] = "https://digital-assets.opticatonline.com/images/800/96220c54f06f19131030316eb79239441b905845.jpg";
    url[29] = "https://digital-assets.opticatonline.com/images/800/b4138a6e646d17d70ec0ee1ac60da47755c99f6f.jpg";
    url[30] = "https://digital-assets.opticatonline.com/images/800/226a1bebc6ad6ace0b54da649ca58a41d8430adf.jpg";
    url[31] = "https://digital-assets.opticatonline.com/images/800/11f88e20979315afc341fbc75488abfdab56eaeb.jpg";
    url[32] = "https://digital-assets.opticatonline.com/images/800/10cf2df92fa4be5b3057dfbcb730e0651fe501ba.jpg";
    url[33] = "https://digital-assets.opticatonline.com/images/800/0a527e1392086eb5abfbc83cbbf81c0bbf25e6fc.jpg";
    url[34] = "https://digital-assets.opticatonline.com/images/800/64ac3b4333b9801607413cccfbdd6989c30809cf.jpg";
    url[35] = "https://digital-assets.opticatonline.com/images/800/b7ba2fd0e0a07682775f733aa3a928c7f99f0a9d.jpg";
    url[36] = "https://digital-assets.opticatonline.com/images/800/d9853dd11d9ea0ce4abba21078b9c151d1458ac8.jpg";
    url[37] = "https://digital-assets.opticatonline.com/images/800/7d34fef6b23b0566baa4bc40aa9b7f25923f789d.jpg";
    url[38] = "https://digital-assets.opticatonline.com/images/800/68b7b093d5454a94163e05557e1dae0be76f2406.jpg";
    url[39] = "https://digital-assets.opticatonline.com/images/800/16959d0c27a2e33ba84742646a44a2558db4b8ab.jpg";
    url[40] = "https://digital-assets.opticatonline.com/images/800/6424185ccfb08b0ad00daec629b8e575dcad038c.jpg";
    url[41] = "https://digital-assets.opticatonline.com/images/800/142859c05045b74886d75909ba351d146166b852.jpg";
    url[42] = "https://digital-assets.opticatonline.com/images/800/f074b39002f722b13719732cbb1462fb2042628d.jpg";
    url[43] = "https://digital-assets.opticatonline.com/images/800/b0deee75aa1cd663f6ee837dd99460ef3ba03dcb.jpg";
    url[44] = "https://digital-assets.opticatonline.com/images/800/0d244af3a7764fed503671e1aa74e6e344a48591.jpg";
    url[45] = "https://digital-assets.opticatonline.com/images/800/17ad61a3532b32840a1dc25b0f41b5887ccd284e.jpg";
    url[46] = "https://digital-assets.opticatonline.com/images/800/88ff70dbde1fbd80bf7e7dda0594fa28c27dba2a.jpg";
    url[47] = "https://digital-assets.opticatonline.com/images/800/60763ce73ffcd33aa41a0ee47387f991317f2f86.jpg";
    url[48] = "https://digital-assets.opticatonline.com/images/800/ab033afcbd6dc5053afbea667d157b08cd0d592c.jpg";
    url[49] = "https://digital-assets.opticatonline.com/images/800/42ef867b2b1f76b989748a8f215aab7fa1202cdf.jpg";
    url[50] = "https://digital-assets.opticatonline.com/images/800/873971329820dde5f8d8174f3fbd48ceb7ae1700.jpg";
    url[51] = "https://digital-assets.opticatonline.com/images/800/7aed3abb1abd34ca6cd91779b1c02cfa7d78de3f.jpg";
    url[52] = "https://digital-assets.opticatonline.com/images/800/257c53557f71798700a8535034dc0d890ee5a938.jpg";
    url[53] = "https://digital-assets.opticatonline.com/images/800/7ff8b0fe77943bd8fe88d0630cd573b4be9a9030.jpg";
    url[54] = "https://digital-assets.opticatonline.com/images/800/f08ecf3ac73903ee8d698ae40a3ab4c4875cf4f6.jpg";
    url[55] = "https://digital-assets.opticatonline.com/images/800/8591d9179c209d72b7215947f3513f64d74a91c1.jpg";
    url[56] = "https://digital-assets.opticatonline.com/images/800/af9db8e377f79e5b3fc2a339c1ec6f884a839dc8.jpg";
    url[57] = "https://digital-assets.opticatonline.com/images/800/113b944fe42741ffc43892d005df89da39f44bb7.jpg";
    url[58] = "https://digital-assets.opticatonline.com/images/800/669424eab327c95c15058d2d803c47060bf15642.jpg";
    url[59] = "https://digital-assets.opticatonline.com/images/800/baebfb4475557625b5ecfdabffe6cec07cd5c2cc.jpg";
    url[60] = "https://digital-assets.opticatonline.com/images/800/178d052433f78a68422743cb85aabc921365b3f2.jpg";
    url[61] = "https://digital-assets.opticatonline.com/images/800/c0a0eb8e1a204b3743c97813544bd04416b77bb9.jpg";
    url[62] = "https://digital-assets.opticatonline.com/images/800/8b69d59f598d2dabff04dce8e0efc8e31c8e2bf2.jpg";
    url[63] = "https://digital-assets.opticatonline.com/images/800/1946783e5518cae922da9a6974c1de3557ae13c4.jpg";
    url[64] = "https://digital-assets.opticatonline.com/images/800/ccb0be5282d043f3295fca936cefa968d6e0ca0d.jpg";
    url[65] = "https://digital-assets.opticatonline.com/images/800/8c06d627d9a7f0da60794db3d07abb1d8a11c9d5.jpg";
    url[66] = "https://digital-assets.opticatonline.com/images/800/b93de365af13ca9591bb9466c50a8d27797c372e.jpg";
    url[67] = "https://digital-assets.opticatonline.com/images/800/521189e80af7e44ce9a91f0c9055bcd1dbd0323f.jpg";
    url[68] = "https://digital-assets.opticatonline.com/images/800/166fa4e8ea39bcd886582fd73e93aad30b5fef48.jpg";
    url[69] = "https://digital-assets.opticatonline.com/images/800/0bb502a9650940193af4859c5a6c55a7be3b62db.jpg";
    url[70] = "https://digital-assets.opticatonline.com/images/800/f62b153b4b39f58bdb5dbf6e71377266255b6f78.jpg";
    url[71] = "https://digital-assets.opticatonline.com/images/800/1cc165a7e8fadf3d044942398f91d51b4deab324.jpg";
    url[72] = "https://digital-assets.opticatonline.com/images/800/633db33b111a44f8c6b015ef6da7feca2d1af785.jpg";

    function pageLoaded() {
      for (let i = 1; i <= 72; i += 1) {
        const image = new Image()
        image.src = url[i]
        image.addEventListener('load', () => {
          images[i] = image
          if (i === 1) {
            loadImage(i)
          }
        })
      }
    }

    function loadImage(index) {
      ctx.drawImage(images[index], 0, 0, canvas.width, canvas.height)
    }

    function handleInputSlider() {
      console.log(this.value)
      loadImage(this.value)
    }
  </script>

 
</body>

</html>