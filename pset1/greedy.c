#include<stdio.h>
#include<cs50.h>
#include<math.h>

int main(void)
{
    float change = 0;
    int flag = 0, cents =0, coins = 0;
    
    
    //getting positive input from user
    while(flag==0)
    {
        printf("O hai! How much change is owed?\n");
        change = get_float();
       
        
        if(change>=0)
            flag = 1;
    }
   
    // rounding off to avoid imprecision
    cents = (int)round(change*100);
    
    // counting number of quarters
    int quarters = cents/25;
    cents = cents%25;
    
    //counting number of dimes
    int dimes = cents/10;
    cents = cents%10;
    
    //counting number of nickels
    int nickels = cents/5;
    cents  =cents%5;
    
    //counting number of pennies
    int pennies = cents;
    
    //summing total coins needed
    coins = quarters+dimes+nickels+pennies;
    
    
    printf("%i", coins);
    printf("\n");
    
    
}