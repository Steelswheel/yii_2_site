import 'bootstrap'
import 'bootstrap/scss/bootstrap.scss';
import './assets/style.scss';
import 'element-ui/lib/theme-chalk/index.css';
import lang from 'element-ui/lib/locale/lang/ru-RU';
import locale from 'element-ui/lib/locale';
locale.use(lang);
import { addComponent } from './helpers';
import './components/mobile-menu';
import './components/slider';
import './components/form-send';
import './components/input';
import './components/reviewToggle';
//import './components/reviewGallery';
import Spotlight from 'spotlight.js';
addComponent('attachment-calculator');
addComponent('reviews-form');
addComponent('cabinet');






