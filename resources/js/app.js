require('./bootstrap');

import Scrollbar from 'smooth-scrollbar';

var options = {
    'damping' : 0.05,
}

var mainScrollbar = document.querySelector('#main-scrollbar');
if (mainScrollbar ?? null)
{
    Scrollbar.init(mainScrollbar, options);
}
