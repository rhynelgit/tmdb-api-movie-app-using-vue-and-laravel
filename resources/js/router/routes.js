import PopularMovieList from '../screen/movie/PopularMovieList'
import ViewMovieDetails from '../screen/movie/ViewMovieDetails'

import Credits from '../screen/Credits'

// Not nound when the get url did not match the path parameter
import NotFound from '../screen/NotFound'

export const routes = [
    
    { name: 'PopularMovieList', path: '/', component: PopularMovieList },
    { name: 'PopularMovieListWithPage', path: '/page/:page', component: PopularMovieList },
    { name: 'ViewMovieDetails', path: '/:id', component: ViewMovieDetails },
    { name: 'Credits', path: '/credits', component: Credits },    
    { name: 'NotFound', path: '/:pathMatch(.*)*', component: NotFound },

]