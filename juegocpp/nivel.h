#include "iostream"
#include "windows.h"
#include "conio.h"
#include "sstream"
#define ARRIBA 72
#define IZQUIERDA 75
#define DERECHA 77
#define ABAJO 80
using namespace std;
struct cord{
    int x,y;
};
struct nivel{
    int mundo[9][9];
    cord sckin;
    cord frut[4];
};

/////////////////////////////////////
/*

-1 -> pared
0 ->bacio
1 ->caja
2 ->fruta
3 scking
4->caja/frut

*/
////////////////////////////////////////
string to_string(int n){
ostringstream temp;
temp << n;
return temp.str();
}
void my_wind(int w,int h){
	string comando="MODE CON COLS="+to_string(w)+" LINES="+to_string(h);
	system(comando.c_str());
}
nivel niveles[10];
void pre_load(){
    for(int e=0;e<10;e++){
    for(int g=0;g<9;g++){for(int i=0;i<9;i++){niveles[e].mundo[g][i]=-1;}}
    for(int g=1;g<8;g++){for(int i=1;i<8;i++){niveles[e].mundo[g][i]=0;}}
    }
}

nivel cargar_nivel(int l){
    //// level uno
    int n=0;
    niveles[n].sckin.x=4;
    niveles[n].sckin.y=4;
    niveles[n].mundo[niveles[n].sckin.x][niveles[n].sckin.y]=3;
    ////obstaculos
    niveles[n].mundo[4][2]=-1;
    niveles[n].mundo[4][6]=-1;
    niveles[n].mundo[2][4]=-1;
    niveles[n].mundo[6][4]=-1;
    /////fruts
    niveles[n].frut[0].x=1;
    niveles[n].frut[0].y=1;
    
    niveles[n].frut[1].x=7;
    niveles[n].frut[1].y=7;
    
    niveles[n].frut[2].x=7;
    niveles[n].frut[2].y=1;
    
    niveles[n].frut[3].x=3;
    niveles[n].frut[3].y=4;
    
    niveles[n].mundo[niveles[n].frut[0].x][niveles[n].frut[0].y]=2;
    niveles[n].mundo[niveles[n].frut[1].x][niveles[n].frut[1].y]=2;
    niveles[n].mundo[niveles[n].frut[2].x][niveles[n].frut[2].y]=2;
    niveles[n].mundo[niveles[n].frut[3].x][niveles[n].frut[3].y]=2;

    ////cjasas
    niveles[n].mundo[4][1]=1;
    niveles[n].mundo[4][7]=1;
    niveles[n].mundo[1][4]=1;
    niveles[n].mundo[6][3]=1;
    
    //////////////////////////--level 2---///////////////////////////////
    n=1;
    niveles[n].sckin.x=4;
    niveles[n].sckin.y=4;
    niveles[n].mundo[niveles[n].sckin.x][niveles[n].sckin.y]=3;
    ////obstaculos
    niveles[n].mundo[4][2]=-1;
    niveles[n].mundo[4][6]=-1;
    niveles[n].mundo[3][5]=-1;
    niveles[n].mundo[6][4]=-1;
    niveles[n].mundo[7][4]=-1;
    /////fruts
    niveles[n].frut[0].x=4;
    niveles[n].frut[0].y=3;
    
    niveles[n].frut[1].x=3;
    niveles[n].frut[1].y=7;
    
    niveles[n].frut[2].x=7;
    niveles[n].frut[2].y=1;
    
    niveles[n].frut[3].x=3;
    niveles[n].frut[3].y=3;
    
    niveles[n].mundo[niveles[n].frut[0].x][niveles[n].frut[0].y]=2;
    niveles[n].mundo[niveles[n].frut[1].x][niveles[n].frut[1].y]=2;
    niveles[n].mundo[niveles[n].frut[2].x][niveles[n].frut[2].y]=2;
    niveles[n].mundo[niveles[n].frut[3].x][niveles[n].frut[3].y]=2;

    ////cjasas
    niveles[n].mundo[4][1]=1;
    niveles[n].mundo[4][7]=1;
    niveles[n].mundo[2][4]=1;
    niveles[n].mundo[6][3]=1;
    
    //////////////////////////---level 3-----///////////////////////////////
    n=2;
    niveles[n].sckin.x=4;
    niveles[n].sckin.y=4;
    niveles[n].mundo[niveles[n].sckin.x][niveles[n].sckin.y]=3;
    ////obstaculos
    niveles[n].mundo[4][2]=-1;
    niveles[n].mundo[4][5]=-1;
    niveles[n].mundo[3][5]=-1;
    niveles[n].mundo[3][6]=-1;
    niveles[n].mundo[2][1]=-1;
    niveles[n].mundo[3][4]=-1;
    niveles[n].mundo[3][3]=-1;
    niveles[n].mundo[6][4]=-1;
    niveles[n].mundo[6][5]=-1;

    niveles[n].mundo[7][1]=-1;
    niveles[n].mundo[1][4]=-1;
    niveles[n].mundo[1][5]=-1;
    niveles[n].mundo[1][6]=-1;
    niveles[n].mundo[1][7]=-1;
    /////fruts
    niveles[n].frut[0].x=4;
    niveles[n].frut[0].y=3;
    
    niveles[n].frut[1].x=1;
    niveles[n].frut[1].y=1;
    
    niveles[n].frut[2].x=7;
    niveles[n].frut[2].y=5;
    
    niveles[n].frut[3].x=3;
    niveles[n].frut[3].y=7;
    
    niveles[n].mundo[niveles[n].frut[0].x][niveles[n].frut[0].y]=2;
    niveles[n].mundo[niveles[n].frut[1].x][niveles[n].frut[1].y]=2;
    niveles[n].mundo[niveles[n].frut[2].x][niveles[n].frut[2].y]=2;
    niveles[n].mundo[niveles[n].frut[3].x][niveles[n].frut[3].y]=2;

    ////cjasas
    niveles[n].mundo[5][2]=1;
    niveles[n].mundo[3][4]=1;
    niveles[n].mundo[5][6]=1;
    niveles[n].mundo[6][3]=1;
    
    ////////////////////////////////level 4///////////////////////////////////////////
   n=3;
   niveles[n].sckin.x=4;
    niveles[n].sckin.y=4;
    niveles[n].mundo[niveles[n].sckin.x][niveles[n].sckin.y]=3;
    ////obstaculos
    niveles[n].mundo[1][1]=-1;
    niveles[n].mundo[7][7]=-1;
    niveles[n].mundo[3][6]=-1;
    niveles[n].mundo[5][5]-1;
    niveles[n].mundo[6][4]=-1;
    //niveles[n].mundo[7][4]=-1;
    niveles[n].mundo[3][4]=-1;
    niveles[n].mundo[4][3]=-1;
    niveles[n].mundo[4][2]=-1;
    niveles[n].mundo[5][2]=-1;
    niveles[n].mundo[4][7]=-1;
     
    niveles[n].mundo[2][1]=-1;
    niveles[n].mundo[3][4]=-1;
    niveles[n].mundo[3][3]=-1;
    niveles[n].mundo[6][4]=-1;
    niveles[n].mundo[6][5]=-1;
    niveles[n].mundo[7][1]=-1;
    niveles[n].mundo[1][4]=-1;

    /////fruts
    
    niveles[n].frut[1].x=5;
    niveles[n].frut[1].y=1;
    
    niveles[n].frut[0].x=2;
    niveles[n].frut[0].y=1;
    
    niveles[n].frut[2].x=3;
    niveles[n].frut[2].y=7;
    
    niveles[n].frut[3].x=6;
    niveles[n].frut[3].y=5;
    
    niveles[n].mundo[niveles[n].frut[0].x][niveles[n].frut[0].y]=2;
    niveles[n].mundo[niveles[n].frut[1].x][niveles[n].frut[1].y]=2;
    niveles[n].mundo[niveles[n].frut[2].x][niveles[n].frut[2].y]=2;
    niveles[n].mundo[niveles[n].frut[3].x][niveles[n].frut[3].y]=2;

    ////cjasas
    niveles[n].mundo[3][5]=1;
    niveles[n].mundo[2][6]=1;
    niveles[n].mundo[5][6]=1;
    niveles[n].mundo[6][3]=1;
    
    
    ///*//////////////////////////////////////////////////////////////////
    return niveles[l];
	
}


  
///////////////////////////////////////
