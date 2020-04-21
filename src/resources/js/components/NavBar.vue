<template>
  <v-app>
    <v-navigation-drawer app v-model="drawer" clipped>
      <v-list>
        <!-- TODO:リンクがイマイチイケてない感じするけどいったんこれで -->
        <v-list-item v-for="item in items" :key="item.title" :href="item.link">
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar color="deep-purple accent-4" dense dark app clipped-left>
      <v-app-bar-nav-icon @click="drawer=!drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Page title</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-menu left bottom>
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item v-for="n in 5" :key="n" @click="() => {}">
            <v-list-item-title>Option {{ n }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        { title: "マイページ", icon: "mdi-home", link: "/mypage" },
        {
          title: "しおり作成",
          icon: "",
          link: "/travel_brochure/create"
        },
        {
          title: "しおり一覧",
          icon: "",
          link: "/travel_brochure"
        },
        {
          title: "みんなのしおり",
          icon: "",
          link: ""
        },
        { title: "友達検索", icon: "", link: "/mypage" }
      ]
    };
  }
};
</script>
