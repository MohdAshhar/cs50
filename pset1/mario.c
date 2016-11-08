#include<stdio.h>
#include<cs50.h>

int main(void)
{
    int flag =0;
    int height = 0;
    
    
    while(flag==0)
    {
        printf("Height: ");
        height = get_int();
        
        if(height>=0&&height<24)
            flag =1;
        
            
    
    }
    
    int h =height;
    
    
    for(int i =2;i<h+2;i++)
    {
        int spaces = height-1;
        int hashes = i;
        while(spaces!=0)
        {
            printf(" ");
            spaces--;
        }
        
        while(hashes!=0)
        {
            printf("#");
            hashes--;
        }
        height--;
        printf("\n");
        
       
    }
}