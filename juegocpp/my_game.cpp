#include "nivel.h"
#include "windows.h"
#include "conio.h"
int po[4];
//po -> n s e o
int level;
nivel game;
int x,y,cont=0;
int me_rodea(int x,int y){
                 
		    po[0]=game.mundo[x][y-1];
	        po[1]=game.mundo[x][y+1];
	        po[2]=game.mundo[x-1][y];
	        po[3]=game.mundo[x+1][y];

}
void color(int c){
	SetConsoleTextAttribute(GetStdHandle (STD_OUTPUT_HANDLE),c);
}
void pintar(){
    system("cls");
    for(int g=0;g<9;g++){
	for(int i=0;i<9;i++){
		if(game.mundo[g][i]==-1){
		    color(10);
		    cout<<"²²";
		    color(10);
        }else if(game.mundo[g][i]==0){
            cout<<"  ";
        }else if (game.mundo[g][i]==1){
             color(13);
            cout<<"°°";
            color(10);
        }else if(game.mundo[g][i]==4){
            // color();
            cout<<"²²";
            color(10);
        }else if(game.mundo[g][i]==3){
            color(14);
            cout<<"[]";
            color(10);
        }else{
            game.mundo[g][i]=2;
             color(12);
            cout<<"O´";
            color(10);
        }
	}
	cout<<endl;
	 color(10);
}

}
bool search_frut(int x,int y){
    for(int i=0;i<4;i++){

        if(x==game.frut[i].x and y == game.frut[i].y){
            
            return true;
        }
    }
    return false;
}
void mover(){
        me_rodea(x,y);
        if(cargar_nivel(level).mundo[x][y]!=2 and cargar_nivel(level).mundo[x][y]!=4){
            game.mundo[x][y]=0;
        }else{
            game.mundo[x][y]=cargar_nivel(level).mundo[x][y];
        }
		
	if(kbhit()){//valida si se presiono una tecla
       
       
		char tecla=getch();//detecta la tecla pulsada
		if(tecla==IZQUIERDA){
		    if(po[0]!=-1 and po[0]!=4){
		        if(po[0]==1){
		            if(game.mundo[x][y-2]!=-1 and game.mundo[x][y-2]!=4){
		                if(search_frut(x,y-2)){
                        game.mundo[x][y-2]=4;
                        cont++;
                        }else{
                        game.mundo[x][y-1]=0;
		                game.mundo[x][y-2]=1;
		                
                        }
		                
		            y--; 
                    }
		            
                }else{
                    y--;
                }
                     
                
		       
            }
        }
		else if(tecla==DERECHA){
		    if(po[1]!=-1 and po[1]!=4){
		        if(po[1]==1 ){
		            if(game.mundo[x][y+2]!=-1 and game.mundo[x][y+2]!=4){
		                if(search_frut(x,y+2)){
                        game.mundo[x][y+2]=4;
                        cont++;
                        }else{
                            game.mundo[x][y+1]=0;
		                    game.mundo[x][y+2]=1;
                        }
                    
		            y++;
                    }
		            
                }else{
                    y++;
                }
		        
            }
        }
		else if(tecla==ARRIBA){
		if(po[2]!=-1 and po[2]!=4){
		    if(po[2]==1 ){
		        if(game.mundo[x-2][y]!=-1 and game.mundo[x-2][y]!=4){
		             if(search_frut(x-2,y)){
                        game.mundo[x-2][y]=4;
                        cont++;
                        }else{
                            game.mundo[x-1][y]=0;
		                    game.mundo[x-2][y]=1;
                        }
		            
		            x--;
                }
		            
                }else{
                    x--;
                }
		        
            }
		}
		else if(tecla==ABAJO){
		if(po[3]!=-1 and po[3]!=4){
		    if(po[3]==1 ){
		        if(game.mundo[x+2][y]!=-1 and game.mundo[x+2][y]!=4){
		            if(search_frut(x+2,y)){
                        game.mundo[x+2][y]=4;
                        cont++;
                        }else{
                            game.mundo[x+1][y]=0;
		                    game.mundo[x+2][y]=1;
                        }
		            
		             x++;
                }
		            
                }else{
                     x++;
                }
		       
            }
		}
		game.mundo[x][y]=3;
		
		pintar();
	}
	
}


int main(){
    
    my_wind(20,10);
    level=0;
    pre_load();
    game=cargar_nivel(level);
    x=game.sckin.x,y=game.sckin.y;
    if(!x and !y ){
        x=4;
        y=4;
        if(cargar_nivel(level).mundo[x][y]!=0){
            x=x+1;
        }
    }
    pintar();
    do{
        if(cont==4){
            level++;
            if(level==3)break;
            cont=0;
             game=cargar_nivel(level);
             x=game.sckin.x,y=game.sckin.y;
            cout<<"Level "<<level+1<<endl;
            system("pause>>null");
        }
        mover();
       	Sleep(120);
    }while(true);
    cout<<endl;
    cout<<endl;
    my_wind(900,120);
    cout<<"HAS GANADO"<<endl;
   

}

