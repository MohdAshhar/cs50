#include<stdio.h>
#include<cs50.h>

int main(void)
{
    int time=0, flag =0;
    while(flag ==0)
    {
        printf("minutes:");
        time = get_int();
        
        if(time > 0)
        {
            printf("bottles needed: %d\n", time*12);
            flag =1;
        }
    }        
}