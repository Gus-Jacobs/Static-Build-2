//sidebar
const menuItems = document.querySelectorAll('.menu-item');

//messages
const messageNotifications = document.querySelector('#messages-notifications');
const messages = document.querySelector('.messages');
const message = messages.querySelectorAll('.message');
const messageSearch = document.querySelector('#message-search');

//theme
const themer = document.querySelector('#theme');
const themeModal = document.querySelector('.customize-theme');
const fontSizes = document.querySelectorAll('.choose-size span');
var root = document.querySelector(':root');
const colorPalette = document.querySelectorAll('.choose-color span');
const Bg1 = document.querySelector('.bg-1');
const Bg2 = document.querySelector('.bg-2');
const Bg3 = document.querySelector('.bg-3');

//left side menu items
const explore = document.querySelector('#explore');
const exploreModal = document.querySelector('.customize-explore');

const bookmark = document.querySelector('#bookmark');
const bookmarkModal = document.querySelector('.customize-bookmark');

const setting = document.querySelector('#settings');
const settingModal = document.querySelector('.customize-settings');

const analytics = document.querySelector('#analytics');
const analyticsModal = document.querySelector('.customize-analytics');

//hide
const log = document.querySelector('.login');
const site = document.querySelector('.site');


//sidebar

const changeActiveItem = () => {
	menuItems.forEach(item => {
		item.classList.remove('active');
	})
}

menuItems.forEach(item => {
	item.addEventListener('click', () => {
		changeActiveItem();
		item.classList.add('active');
		if (item.id != 'Notifications'){
			document.querySelector('.Notifications-popup').style.display = 'none';
		} else{
			document.querySelector('.Notifications-popup').style.display = 'block';
			document.querySelector('#Notifications .notification-count').style.display = 'none';
		}
	})
})

//messages
//searhes chat

const searchMessage = () => {
	const val = messageSearch.value.toLowerCase();
	message.forEach(user => {
		let name = user.querySelector('h5').textContent.toLowerCase();
		if(name.indexOf(val) != -1){
			user.style.display = 'flex';
		} else{
			user.style.display = 'none';
		}
console.log(val);
	})
	}
		

//search chat 
messageSearch.addEventListener('keyup', searchMessage);

//highlight message card
messageNotifications.addEventListener('click', () => {
	messages.style.boxShadow = '0 0 1rem var(--color-primary)';
	messageNotifications.querySelector('.notification-count').style.display ='none';
	setTimeout(() => {
		messages.style.boxShadow = 'none';
	}, 2000);
})

//theme
//open
const openThemeModal = () => {
	themeModal.style.display = 'grid';
}

//close
const closeThemeModal = (e) => {
	if (e.target.classList.contains('customize-theme')){
		themeModal.style.display = 'none';
	}
}

themeModal.addEventListener('click', closeThemeModal);

themer.addEventListener('click', openThemeModal);


//fonts

//remove active class from font size
const removeSizeSelector = () => {
	fontSizes.forEach(size => {
		size.classList.remove('active');
	})
}

fontSizes.forEach(size => {
	size.addEventListener('click', () => {
	 removeSizeSelector();
	 let fontSize;
	 size.classList.toggle('active');
	
		if (size.classList.contains('font-size-1')){
		fontSize = '10px';
		root.style.setProperty('--sticky-top-left', '5.4rem');
		root.style.setProperty('--sticky-top-right', '5.4rem');
	} else if(size.classList.contains('font-size-2')){
		fontSize = '13px';
		root.style.setProperty('--sticky-top-left', '5.4rem');
		root.style.setProperty('--sticky-top-right', '-7rem');
	} else if(size.classList.contains('font-size-3')){
		fontSize = '16px';
		root.style.setProperty('--sticky-top-left', '-2rem');
		root.style.setProperty('--sticky-top-right', '-17rem');
	} else if(size.classList.contains('font-size-4')){
		fontSize = '19px';
		root.style.setProperty('--sticky-top-left', '-5rem');
		root.style.setProperty('--sticky-top-right', '-25rem');
	} else if(size.classList.contains('font-size-5')){
		fontSize = '22px';
		root.style.setProperty('--sticky-top-left', '-12rem');
		root.style.setProperty('--sticky-top-right', '-35rem');
	}

	// change font size of the root
	document.querySelector('html').style.fontSize = fontSize;
	})
	
})

//remove active class from color
const changeActiveColorClass = () => {
	colorPalette.forEach(colorPicker => {
		colorPicker.classList.remove('active');
	})
}

//change color
colorPalette.forEach(color => {
	color.addEventListener('click', () => {
		let primary;
		changeActiveColorClass();

		if (color.classList.contains('color-1')){
			primaryHue = 252;
		} else if(color.classList.contains('color-2')){
			primaryHue = 52;
		} else if(color.classList.contains('color-3')){
			primaryHue = 352;
		} else if(color.classList.contains('color-4')){
			primaryHue = 152;
		} else if(color.classList.contains('color-5')){
			primaryHue = 202;
		} 
		color.classList.add('active');

		root.style.setProperty('--primary-color-hue', primaryHue);
	})
})

//theme background
let lightColorLightness;
let whiteColorLightness;
let darkColorLightness;

//change bgc
// const changeBG = () => {
// 	root.style.setProperty('--light-color-lightness', lightColorLightness);
// 	root.style.setProperty('--white-color-lightness', whiteColorLightness);
// 	root.style.setProperty('--dark-color-lightness', darkColorLightness);
// }

// Bg1.addEventListener('click', () => {
// 	//add active class
// 	Bg1.classList.add('active');
// 	//remove active class
// 	Bg2.classList.remove('active');
// 	Bg3.classList.remove('active');
// 	window.location.reload();
// });

// Bg2.addEventListener('click', () => {
// 	darkColorLightness = '95%';
// 	whiteColorLightness = '20%';
// 	lightColorLightness = '15%';

// 	//add active class
// 	Bg2.classList.add('active');
// 	//remove active class
// 	Bg1.classList.remove('active');
// 	Bg3.classList.remove('active');
// 	changeBG();
// });

// Bg3.addEventListener('click', () => {
// 	darkColorLightness = '95%';
// 	whiteColorLightness = '10%';
// 	lightColorLightness = '0%';

// 	//add active class
// 	Bg3.classList.add('active');
// 	//remove active class
// 	Bg1.classList.remove('active');
// 	Bg2.classList.remove('active');
// 	changeBG();
// });

//settings

const openSettingModal = () => {
	settingModal.style.display = 'grid';
}

//close
const closeSettingModal = (e) => {
	if (e.target.classList.contains('customize-settings')){
		settingModal.style.display = 'none';
	}
}

settingModal.addEventListener('click', closeSettingModal);

setting.addEventListener('click', openSettingModal);

//analytics

const openAnalyticsModal = () => {
	analyticsModal.style.display = 'grid';
}

//close
const closeAnalyticsModal = (e) => {
	if (e.target.classList.contains('customize-analytics')){
		analyticsModal.style.display = 'none';
	}
}

analyticsModal.addEventListener('click', closeAnalyticsModal);

analytics.addEventListener('click', openAnalyticsModal);

//bookmark

const openBookmarkModal = () => {
	bookmarkModal.style.display = 'grid';
}

//close
const closeBookmarkModal = (e) => {
	if (e.target.classList.contains('customize-bookmark')){
		bookmarkModal.style.display = 'none';
	}
}

bookmarkModal.addEventListener('click', closeBookmarkModal);

bookmark.addEventListener('click', openBookmarkModal);

//explore

const openExploreModal = () => {
	exploreModal.style.display = 'grid';
}

//close
const closeExploreModal = (e) => {
	if (e.target.classList.contains('customize-explore')){
		exploreModal.style.display = 'none';
	}
}

exploreModal.addEventListener('click', closeExploreModal);

explore.addEventListener('click', openExploreModal);

function refresh(){
	location.reload();
}

//posts

const post = document.querySelector('.create-post');
const postModal = document.querySelector('.customize-post');

const openPostModal = () => {
	postModal.style.display = 'grid';
}

//close
const closePostModal = (e) => {
	if (e.target.classList.contains('customize-post')){
		postModal.style.display = 'none';
	}
}

postModal.addEventListener('click', closePostModal);

post.addEventListener('click', openPostModal);

//explore content of a single user
