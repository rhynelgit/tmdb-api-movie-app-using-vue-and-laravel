<template>
  <div class="center-box-header">
    <a @click="$router.go(-1)" href="#">Back</a>

    <h3 class="mt-3">Credits</h3>
    <br />
  </div>
  <div class="center-box-body">
    The source of this movie API is from TMDB<br />
    <p>
      The Movie Database (TMDb) is a community built movie and TV database. Every piece of
      data has been added by our amazing community dating back to 2008. TMDb's strong
      international focus and breadth of data is largely unmatched and something we're
      incredibly proud of. Put simply, we live and breathe community and that's precisely
      what makes us different.
    </p>

    <img
      src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_short-8e7b30f73a4020692ccca9c88bafe5dcb6f8a62a4c6bc55cd9ba82bb2cd95f6c.svg"
    />
  </div>
</template>
<script>
export default {
  name: "NotFound",
};
</script>
