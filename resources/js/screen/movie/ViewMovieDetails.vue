<template>
  <div class="center-box-header">
    <a @click="$router.go(-1)" href="#">Back</a>

    <div v-if="!pageLoading">
      <div v-if="hasError" class="text-error"><br />{{ errorMessage.message }}</div>
      <div class="center-box-body" v-else>
        <div class="wid-6">
          <br />
          <img style="width: 95%" :src="cardImage + movie.poster_path" />
        </div>
        <div class="wid-6">
          <h2>{{ movie.title }}</h2>
          <div>
            Vote Average: <strong>{{ movie.vote_average }}</strong> &nbsp; | &nbsp;
            <span>
              Release Date: <strong>{{ movie.release_date }}</strong>
            </span>
          </div>
          <br />

          <h4>Overview</h4>
          <p>{{ movie.overview }}</p>
        </div>
      </div>
    </div>
    <div class="text-center mt-3" v-else>Loading...</div>
  </div>
</template>
<script>
import { mapState } from "vuex";

export default {
  name: "ViewMovieDetails",
  data() {
    return {
      cardImage: "https://image.tmdb.org/t/p/original/",
    };
  },
  computed: {
    ...mapState("MovieSingle", ["pageLoading", "movie", "hasError", "errorMessage"]),
  },
  created() {
    this.$store.dispatch("MovieSingle/fetch", this.$route.params.id);
  },
};
</script>
