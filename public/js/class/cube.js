class cube {
    constructor(Xcord, Ycord, Speed, id_Cube) {
        this.X = Xcord;
        this.Y = Ycord;
        this.speed = Speed;
        this.id_cube = id_Cube;
    }
    get get_id_cube(){
        return this.id_cube;
    }
    get get_Y(){
        return this.Y;
    }
    get get_X(){
        return this.X;
    }
    get get_speed(){
        return this.speed;
    }
    set set_Y(Ycord){
        this.Y = Ycord;
    }
    set set_X(Xcord){
        this.X = Xcord;
    }
}