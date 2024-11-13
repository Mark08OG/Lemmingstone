export type TPoint = {
    x: number;
    y: number;
}

export enum EDIRECTION {
    LEFT = 'left',
    RIGHT = 'right',
    UP = 'up',
    DOWN = 'down',
};

export type TWINDOW = {
    LEFT: number;
    TOP: number;
    HEIGHT: number;
    WIDTH: number;
}

const CONFIG = {
<<<<<<< HEAD
    // dev
    HOST: 'http://localhost:8888/lemmingstone.local/api',
    // UdSU
    //HOST: 'http://lemmingstone:81/api',
=======
    HOST: 'http://localhost:80/lemmingStone/api',
>>>>>>> e6ea8b3395a6fc99e59aa8da912dad2e0f353ed0

    CHAT_TIMESTAMP: 200, //ms

    SPRITE_SIZE: 64, // размер спрайта в пикселях
    LINE_OF_SPRITES: 10, // количество спрайтов в карте спрайтов
    WIDTH: 50, // ширина карты
    HEIGHT: 32, // высота карты 
    // игровое окно, видимое пользователю
    WINDOW: {
        LEFT: 0,
        TOP: 0,
        HEIGHT: 12,
        WIDTH: 20,
    },
};

export default CONFIG;