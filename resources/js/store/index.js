import { createStore } from 'vuex'

import Movies from './modules/Movies'
import MovieSingle from './modules/MovieSingle'

const store = createStore({
	modules: {
		Movies,
		MovieSingle
	}
})

export default store