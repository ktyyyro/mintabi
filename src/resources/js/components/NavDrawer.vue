<template>
  <v-toolbar :color="bar.class" :dark="bar.dark">
    <v-app-bar-nav-icon></v-app-bar-nav-icon>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-btn icon>
      <v-icon>mdi-magnify</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>mdi-heart</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>mdi-dots-vertical</v-icon>
    </v-btn>
  </v-toolbar>
</template>

<script>
export default {
  data() {
    return {
      drawer: null,
      items: [
        { title: "マイページ", icon: "home", link: "/mypage" },
        {
          title: "しおり作成",
          icon: "account_box",
          link: "/travel_brochure/create"
        },
        {
          title: "しおり一覧",
          icon: "account_box",
          link: "/travel_brochure"
        },
        { title: "友達検索", icon: "account_box", link: "/mypage" }
      ]
    };
  }
};
</script>
