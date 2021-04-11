<template>
  <div class="center-box-header">
    <ul class="inline-list">
      <li>
        <router-link :to="{ name: 'PopularMovieList' }"
          ><h2>Popular Movies</h2></router-link
        >
      </li>
      <li>|&nbsp; <router-link :to="{ name: 'Credits' }">Credits</router-link></li>
    </ul>
  </div>
  <div v-if="!pageLoading">
    <div v-if="hasError" class="text-error">{{ errorMessage.message }}</div>
    <div class="center-box-body" v-else>
      <CardList
        v-for="movie in movies"
        :key="movie.id"
        :movie="movie"
        @click="viewMovieDetails(movie.id)"
      ></CardList>

      <div class="wid-11">
        <Pagination />
      </div>
      <div class="wid-1 float-right">Page {{ page }}</div>
    </div>
  </div>
  <div class="text-center mt-3" v-else>Loading...</div>
</template>
<script>
import { mapState } from "vuex";
import CardList from "../../components/CardList";
import Pagination from "../../components/Pagination";

export default {
  name: "Welcome",
  components: { CardList, Pagination },
  computed: {
    ...mapState("Movies", [
      "pageLoading",
      "page",
      "movies",
      "total_pages",
      "total_results",
      "hasError",
      "errorMessage",
    ])
  },
  methods: {
    viewMovieDetails(movieId) {
      // When users want to view the specific movie details via movie id
        this.$router.push({ name: "ViewMovieDetails", params: { id: movieId } });
    },
  },
  created() {
    // This will get or check the page number parameter at the URL
      let paramPageNumber = this.$route.params.page,
          lastPage = this.$store.state.Movies.total_pages,
          page

      if(paramPageNumber < 1)
          page = 1
      
      if(page >= 1){
          this.$router.push({
            name: "PopularMovieListWithPage",
            params: { page: page },
          });
      }
    
    // Dispatch to fetch movies by page number
      this.$store.dispatch(
            "Movies/fetch",
            paramPageNumber ||  page
     );
  },
};
</script>
