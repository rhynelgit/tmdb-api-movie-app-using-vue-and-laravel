<template>
    <ul class="pagination">
      <li v-if="isInFirstPage">
        <a :disabled="isInFirstPage" class="disabled"> First </a>
      </li>
      <li v-else>
        <a @click="onClickFirstPage"> First </a>
      </li>

      <li v-if="isInFirstPage">
        <a :disabled="isInFirstPage" class="disabled"> &laquo; </a>
      </li>
      <li v-else>
        <a @click="onClickPreviousPage"> &laquo; </a>
      </li>

      <li v-for="page in pages" :key="page.number">
        <a
          v-if="page.isDisabled"
          :disabled="page.isDisabled"
          :class="{ active: page.number == this.$store.state.Movies.page }"
        >
          {{ page.number }}
        </a>
        <a
          v-else
          :class="{ active: page.number == this.$store.state.Movies.page }"
          @click="onClickPage(page.number)"
        >
          {{ page.number }}
        </a>
      </li>

      <li v-if="isInLastPage">        
        <a :disabled="isInLastPage" class="disabled"> &raquo; </a>
      </li>
      <li v-else>
        <a @click="onClickNextPage"> &raquo; </a>
      </li>

      <li v-if="isInLastPage">
        <a :disabled="isInLastPage" class="disabled"> Last </a>
      </li>
      <li v-else>
        <a @click="onClickLastPage"> Last </a>
      </li>
    </ul>
</template>
<script>
import { mapState } from "vuex";

export default {
  name: "Pagination",
  computed: {
    startPage() {
      let page = this.$store.state.Movies.page;

      // When on the first page
      if (page === 1) return 1;

      // When on the last page
      if (page === this.$store.state.Movies.total_pages)
        return this.$store.state.Movies.total_pages - 5;

      // When in between
      if (page > 3) return page - 3;
      else return page;
    },
    pages() {
      const range = [];

      let page = this.$store.state.Movies.page,
        modifiedPage;

      // Loop the range clickable links
      for (
          let i = this.startPage;
          i <= Math.min(
            this.startPage + this.$store.state.Movies.total_results - 1,
            this.$store.state.Movies.total_pages
          );
          i++
      ) {
            // To range up clickable links
            if (page < 3) modifiedPage = page + 5;
            else modifiedPage = page + 3;

            // Push to range array
            if (i <= modifiedPage) {
              range.push({
                number: i,
                isDisabled: i === page,
              });
            }
      }

      return range;
    },
    isInFirstPage() {
      // Return true when movie page is in the first page 
      return this.$store.state.Movies.page === 1;
    },
    isInLastPage() {
      // Return true when movie page is in the last page 
      return this.$store.state.Movies.page === this.$store.state.Movies.total_pages;
    },
  },
  methods: {
    onClickFirstPage() {
      // When users want to visit the first page
        this.$router.push({
          name: "PopularMovieListWithPage",
          params: { page: 1 },
        });

        this.$store.dispatch("Movies/fetch", 1);
    },
    onClickPreviousPage() {
      // When users want to visit the previous page
        let page = this.$store.state.Movies.page - 1;

        this.$router.push({
            name: "PopularMovieListWithPage",
            params: { page: page },
        });

        this.$store.dispatch("Movies/fetch", page);
    },
    onClickPage(page) {
      // When users want to visit the designated page number 
        this.$router.push({
            name: "PopularMovieListWithPage",
            params: { page: page },
        });

        this.$store.dispatch("Movies/fetch", page);
    },
    onClickNextPage() {
       // When users want to visit the next page
        let page = this.$store.state.Movies.page + 1;

        this.$router.push({
            name: "PopularMovieListWithPage",
            params: { page: page },
        });

        this.$store.dispatch("Movies/fetch", page);
    },
    onClickLastPage() {
      // When users want to visit the last page
        let lastPage = this.$store.state.Movies.total_pages;

        this.$router.push({
            name: "PopularMovieListWithPage",
            params: { page: lastPage },
        });

        this.$store.dispatch("Movies/fetch", lastPage);
    },
  }
};
</script>
