import Alpine from 'alpinejs'
import { countdownTimer } from './countdown'
import './photo-upload';
import.meta.glob(['../images/**']);


window.Alpine = Alpine;
window.countdownTimer = countdownTimer;

Alpine.start()
