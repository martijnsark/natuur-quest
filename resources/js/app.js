import Alpine from 'alpinejs'
import { countdownTimer } from './countdown.js'
import './photo-upload';
import.meta.glob(['../images/**']);
import './countdown';


window.Alpine = Alpine;
window.countdownTimer = countdownTimer;

Alpine.start()
