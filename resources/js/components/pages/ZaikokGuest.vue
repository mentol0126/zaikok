<template>
  <div>
    <section>
      <v-parallax src="images/hero.jpeg" height="600">
        <v-layout
          column
          align-center
          justify-center
          class="white--text"
        >
          <h1 class="white--text mb-2 display-1 text-xs-center">在庫管理 -zaikok-</h1>
          <div class="subheading mb-3 text-xs-center">Powered by ya-sato@mentol</div>
          <v-btn
            class="blue lighten-2 mt-5"
            dark
            large
            href="/register"
          >
            はじめる
          </v-btn>
        </v-layout>
      </v-parallax>
    </section>

    <section>
      <v-layout
        column
        wrap
        class="my-5"
        align-center
      >
        <v-flex xs12 sm4 class="my-3">
          <div class="text-xs-center">
            <h2 class="headline">Detail</h2>
            <span class="subheading">
            </span>
          </div>
        </v-flex>
        <v-flex xs12>
          <v-container grid-list-xl>
            <v-layout row wrap align-center>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline text-xs-center">Simple & SHARE</div>
                  </v-card-title>
                  <v-card-text>
                    シンプルで直感的な操作感
                    在庫の共有も簡単です
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline">WEB & LINE</div>
                  </v-card-title>
                  <v-card-text>
                    WEB からの利用だけでなく LINE BOT からも利用できます
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">build</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline text-xs-center">Free & OSS</div>
                  </v-card-title>
                  <v-card-text>
                    利用料は無料です
                    オープンソースです
                  </v-card-text>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </v-flex>
      </v-layout>
    </section>
  </div>
</template>

<script>
export default {
  created() {
    this.$store.dispatch('logout')
  },
}
</script>
