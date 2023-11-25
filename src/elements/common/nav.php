<nav class="global-navigation">
	<ul>
		<li>
			<a href="<?php echo home_url('/news/'); ?>">お知らせ<span>NEWS</span></a>
		</li>
		<li>
			<a href="<?php echo home_url('/service/'); ?>">料金・エリア<span>SERVICE</span></a>
		</li>
		<li>
			<a href="<?php echo home_url('/'); ?>#result">釣果情報<span>RESULT</span></a>
		</li>
		<li>
			<a href="<?php echo home_url('/'); ?>#reserve">ご予約カレンダー<span>RESERVE</span></a>
		</li>
		<li>
			<a href="<?php echo home_url('/'); ?>#access">アクセス<span>ACCESS</span></a>
		</li>
		<li>
			<a href="<?php echo home_url('/contact/'); ?>">お問い合わせ<span>CONTACT</span></a>
		</li>
	</ul>
</nav>

<nav class="sns-navigation">
	<ul>
		<li>
			<a href="<?php the_field('sns_instagram', 'option'); ?>" target="_blank">
				<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
					<title>instagram</title>
					<path d="M29.292 0.350001C23.972 0.601001 20.339 1.45 17.163 2.698C13.876 3.979 11.09 5.698 8.31802 8.48C5.54602 11.262 3.83902 14.05 2.56702 17.342C1.33602 20.525 0.50202 24.161 0.26702 29.484C0.0320201 34.807 -0.01998 36.518 0.00602004 50.096C0.03202 63.674 0.0920201 65.376 0.35002 70.71C0.60402 76.029 1.45002 79.661 2.69802 82.838C3.98102 86.125 5.69802 88.91 8.48102 91.683C11.264 94.456 14.05 96.159 17.35 97.433C20.53 98.662 24.167 99.5 29.489 99.733C34.811 99.966 36.524 100.02 50.098 99.994C63.672 99.968 65.381 99.908 70.714 99.655C76.047 99.402 79.66 98.55 82.838 97.308C86.125 96.022 88.912 94.308 91.683 91.524C94.454 88.74 96.16 85.95 97.431 82.656C98.663 79.476 99.5 75.839 99.731 70.521C99.964 65.184 100.019 63.48 99.993 49.904C99.967 36.328 99.906 34.626 99.653 29.294C99.4 23.962 98.553 20.341 97.306 17.162C96.021 13.875 94.306 11.092 91.524 8.317C88.742 5.542 85.95 3.837 82.657 2.569C79.475 1.338 75.84 0.499001 70.518 0.269001C65.196 0.0390009 63.483 -0.0199991 49.904 0.00600086C36.325 0.0320009 34.625 0.0900009 29.292 0.350001ZM29.876 90.738C25.001 90.526 22.354 89.716 20.59 89.038C18.254 88.138 16.59 87.05 14.832 85.309C13.074 83.568 11.994 81.898 11.082 79.567C10.397 77.803 9.57202 75.159 9.34402 70.284C9.09602 65.015 9.04402 63.433 9.01502 50.084C8.98602 36.735 9.03702 35.155 9.26802 29.884C9.47602 25.013 10.291 22.363 10.968 20.6C11.868 18.261 12.952 16.6 14.697 14.843C16.442 13.086 18.107 12.004 20.44 11.092C22.202 10.404 24.846 9.586 29.719 9.354C34.992 9.104 36.572 9.054 49.919 9.025C63.266 8.996 64.85 9.046 70.125 9.278C74.996 9.49 77.647 10.297 79.408 10.978C81.745 11.878 83.408 12.959 85.165 14.707C86.922 16.455 88.005 18.114 88.917 20.452C89.606 22.209 90.424 24.852 90.654 29.728C90.905 35.001 90.962 36.582 90.986 49.928C91.01 63.274 90.963 64.859 90.732 70.128C90.519 75.003 89.711 77.651 89.032 79.417C88.132 81.752 87.047 83.417 85.301 85.173C83.555 86.929 81.892 88.011 79.558 88.923C77.798 89.61 75.151 90.43 70.282 90.662C65.009 90.91 63.429 90.962 50.077 90.991C36.725 91.02 35.15 90.966 29.877 90.738M70.637 23.277C70.639 24.4638 70.9929 25.6233 71.6539 26.6089C72.3149 27.5946 73.2534 28.362 74.3506 28.8143C75.4479 29.2665 76.6545 29.3832 77.8181 29.1496C78.9817 28.916 80.0498 28.3426 80.8874 27.5018C81.7251 26.6611 82.2946 25.5909 82.5239 24.4265C82.7533 23.2621 82.6321 22.0558 82.1759 20.9603C81.7196 19.8647 80.9487 18.9291 79.9607 18.2717C78.9726 17.6143 77.8118 17.2646 76.625 17.267C75.0341 17.2702 73.5095 17.9051 72.3866 19.0321C71.2637 20.1592 70.6344 21.686 70.637 23.277ZM24.327 50.05C24.355 64.23 35.871 75.699 50.048 75.672C64.225 75.645 75.702 64.13 75.675 49.95C75.648 35.77 64.129 24.298 49.95 24.326C35.771 24.354 24.3 35.872 24.327 50.05ZM33.333 50.032C33.3265 46.7356 34.2976 43.5113 36.1236 40.7668C37.9496 38.0223 40.5484 35.8809 43.5913 34.6134C46.6343 33.3459 49.9848 33.0092 53.2192 33.6459C56.4535 34.2826 59.4264 35.8641 61.762 38.1904C64.0975 40.5167 65.6908 43.4833 66.3403 46.7151C66.9898 49.9469 66.6663 53.2987 65.4109 56.3467C64.1554 59.3947 62.0244 62.0019 59.2871 63.8388C56.5499 65.6756 53.3294 66.6595 50.033 66.666C47.8442 66.6706 45.6759 66.244 43.652 65.4105C41.6281 64.577 39.7882 63.3529 38.2374 61.8083C36.6866 60.2636 35.4553 58.4286 34.6138 56.408C33.7723 54.3874 33.3371 52.2208 33.333 50.032Z" fill="#1d1d1f"/>
				</svg>
			</a>
		</li>
		<li>
			<a href="<?php the_field('sns_line', 'option'); ?>" target="_blank">
				<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
					<title>LINE</title>
					<path d="M93.7459 43.9394C93.7459 24.3637 74.121 8.4375 49.998 8.4375C25.8749 8.4375 6.25 24.3637 6.25 43.9394C6.25 61.4894 21.8154 76.1855 42.8385 78.9656C44.2614 79.2732 46.2009 79.9046 46.693 81.1225C47.1358 82.2296 46.98 83.96 46.8365 85.0794C46.8365 85.0794 46.3239 88.1671 46.2132 88.8232C46.0205 89.9303 45.3357 93.1492 50.002 91.1809C54.6725 89.2127 75.1954 76.3454 84.3722 65.7826C90.7115 58.8282 93.75 51.7754 93.75 43.9394H93.7459ZM34.5638 54.4079C34.5638 54.8713 34.1906 55.2444 33.7273 55.2444H21.4382C20.9748 55.2444 20.6017 54.8713 20.6017 54.4079V54.3956V35.3161C20.6017 34.8527 20.9748 34.4796 21.4382 34.4796H24.5422C25.0015 34.4796 25.3787 34.8568 25.3787 35.3161V50.4714H33.7314C34.1906 50.4714 34.5679 50.8487 34.5679 51.3079V54.412L34.5638 54.4079ZM41.961 54.4079C41.961 54.8672 41.5879 55.2444 41.1245 55.2444H38.0205C37.5612 55.2444 37.184 54.8713 37.184 54.4079V35.3161C37.184 34.8568 37.5571 34.4796 38.0205 34.4796H41.1245C41.5879 34.4796 41.961 34.8527 41.961 35.3161V54.4079ZM63.0826 54.4079C63.0826 54.8672 62.7094 55.2444 62.2461 55.2444H59.1625C59.0887 55.2444 59.0149 55.2321 58.9452 55.2157C58.9452 55.2157 58.937 55.2157 58.9329 55.2157C58.9124 55.2116 58.896 55.2034 58.8755 55.1993C58.8673 55.1993 58.8591 55.1911 58.8509 55.1911C58.8386 55.187 58.8222 55.1788 58.8099 55.1747C58.7976 55.1665 58.7812 55.1624 58.7689 55.1542C58.7607 55.1501 58.7525 55.146 58.7443 55.1419C58.7279 55.1337 58.7074 55.1214 58.691 55.1091C58.691 55.1091 58.6828 55.105 58.6828 55.1009C58.6007 55.0435 58.5269 54.9738 58.4654 54.8918L49.7191 43.0783V54.4161C49.7191 54.8754 49.346 55.2526 48.8826 55.2526H45.7786C45.3193 55.2526 44.9421 54.8795 44.9421 54.4161V35.3243C44.9421 34.865 45.3152 34.4878 45.7786 34.4878H48.8621C48.8621 34.4878 48.8826 34.4878 48.8908 34.4878C48.9072 34.4878 48.9195 34.4878 48.9359 34.4878C48.9523 34.4878 48.9646 34.4878 48.981 34.4919C48.9933 34.4919 49.0056 34.4919 49.0179 34.496C49.0343 34.496 49.0507 34.5042 49.0671 34.5083C49.0753 34.5083 49.0876 34.5124 49.0958 34.5165C49.1122 34.5206 49.1287 34.5288 49.1451 34.5329C49.1533 34.5329 49.1615 34.5411 49.1738 34.5411C49.1902 34.5493 49.2066 34.5534 49.223 34.5616C49.2312 34.5657 49.2394 34.5698 49.2476 34.5739C49.264 34.5821 49.2804 34.5903 49.2927 34.5985C49.3009 34.6026 49.3091 34.6067 49.3173 34.6149C49.3337 34.6231 49.346 34.6354 49.3624 34.6436C49.3706 34.6477 49.3788 34.6559 49.387 34.66C49.4034 34.6723 49.4157 34.6846 49.4321 34.6969C49.4362 34.701 49.4444 34.7051 49.4485 34.7092C49.4649 34.7256 49.4813 34.742 49.4977 34.7625C49.4977 34.7625 49.4977 34.7625 49.5018 34.7666C49.5264 34.7953 49.5469 34.824 49.5674 34.8527L58.3014 46.6498V35.312C58.3014 34.8527 58.6745 34.4755 59.1379 34.4755H62.242C62.7012 34.4755 63.0785 34.8486 63.0785 35.312V54.4038L63.0826 54.4079ZM80.0257 38.4161C80.0257 38.8794 79.6526 39.2526 79.1892 39.2526H70.8365V42.4755H79.1892C79.6485 42.4755 80.0257 42.8528 80.0257 43.312V46.4161C80.0257 46.8794 79.6526 47.2526 79.1892 47.2526H70.8365V50.4755H79.1892C79.6485 50.4755 80.0257 50.8528 80.0257 51.312V54.4161C80.0257 54.8795 79.6526 55.2526 79.1892 55.2526H66.9001C66.4367 55.2526 66.0636 54.8795 66.0636 54.4161V54.4038V35.3448V35.3243C66.0636 34.8609 66.4367 34.4878 66.9001 34.4878H79.1892C79.6485 34.4878 80.0257 34.865 80.0257 35.3243V38.4284V38.4161Z" fill="#1d1d1f"/>
				</svg>
			</a>
		</li>
	</ul>
</nav>

<button type="button" class="drawer-menu-button" data-drawer-toggle-button>
	<svg width="40" height="14" viewBox="0 0 40 14" fill="none" xmlns="http://www.w3.org/2000/svg">
		<line y1="0.900146" x2="40" y2="0.900146" stroke="black"/>
		<line y1="6.90015" x2="24" y2="6.90015" stroke="black"/>
		<line y1="12.9001" x2="40" y2="12.9001" stroke="black"/>
	</svg>
</button>