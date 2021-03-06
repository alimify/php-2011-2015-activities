�� / /   * *   I 1 8 N 
 
 / /   C a l e n d a r   S R   l a n g u a g e   S e r b i a n   ( L a t i n )   
 / /   A u t h o r :   M i h a i   B a z o n ,   < m i s h o o @ i n f o i a s i . r o > 
 / /   T r a n s l a t i o n :   N e n a d   N i k o l i c   < s h o n e @ e u r o p e . c o m > 
 / /   E n c o d i n g :   U T F - 1 6 
 / /   F e e l   f r e e   t o   u s e   /   r e d i s t r i b u t e   u n d e r   t h e   G N U   L G P L . 
 
 / /   f u l l   d a y   n a m e s 
 C a l e n d a r . _ D N   =   n e w   A r r a y 
 ( " N e d e l j a " , 
   " P o n e d e l j a k " , 
   " U t o r a k " , 
   " S r e d a " , 
   " e t v r t a k " , 
   " P e t a k " , 
   " S u b o t a " , 
   " N e d e l j a " ) ; 
 
 / /   s h o r t   d a y   n a m e s 
 C a l e n d a r . _ S D N   =   n e w   A r r a y 
 ( " N e d " , 
   " P o n " , 
   " U t o " , 
   " S r e " , 
   " e t " , 
   " P e t " , 
   " S u b " , 
   " N e d " ) ; 
 
 / /   F i r s t   d a y   o f   t h e   w e e k .   " 0 "   m e a n s   d i s p l a y   S u n d a y   f i r s t ,   " 1 "   m e a n s   d i s p l a y 
 / /   M o n d a y   f i r s t ,   e t c . 
 C a l e n d a r . _ F D   =   1 ; 
 
 / /   f u l l   m o n t h   n a m e s 
 C a l e n d a r . _ M N   =   n e w   A r r a y 
 ( " J a n u a r " , 
   " F e b r u a r " , 
   " M a r t " , 
   " A p r i l " , 
   " M a j " , 
   " J u n " , 
   " J u l " , 
   " A v g u s t " , 
   " S e p t e m b a r " , 
   " O k t o b a r " , 
   " N o v e m b a r " , 
   " D e c e m b a r " ) ; 
 
 / /   s h o r t   m o n t h   n a m e s 
 C a l e n d a r . _ S M N   =   n e w   A r r a y 
 ( " J a n " , 
   " F e b " , 
   " M a r " , 
   " A p r " , 
   " M a j " , 
   " J u n " , 
   " J u l " , 
   " A v g " , 
   " S e p " , 
   " O k t " , 
   " N o v " , 
   " D e c " ) ; 
 
 / /   t o o l t i p s 
 C a l e n d a r . _ T T   =   { } ; 
 C a l e n d a r . _ T T [ " I N F O " ]   =   " O   k a l e n d a r u " ; 
 
 C a l e n d a r . _ T T [ " A B O U T " ]   = 
 " D H T M L   K a l e n d a r \ n "   + 
 " ( c )   d y n a r c h . c o m   2 0 0 2 - 2 0 0 3 \ n "   +   / /   d o n ' t   t r a n s l a t e   t h i s   t h i s   ; - ) 
 " N a j n o v i j a   v e r z i j a   k o n t r o l e   n a l a z i   s e   h t t p : / / d y n a r c h . c o m / m i s h o o / c a l e n d a r . e p l \ n "   + 
 " D i s t r i b u i r a n o   p o   G N U   L G P L   l i c e n c o m .     Z a   d e t a l j e   p o g l e d a j   h t t p : / / g n u . o r g / l i c e n s e s / l g p l . h t m l . "   + 
 " \ n \ n "   + 
 " I z b o r   d a t u m a : \ n "   + 
 " -   K o r i s t i   d u g m i e   \ x a b ,   \ x b b   z a   i z b o r   g o d i n e \ n "   + 
 " -   K o r i s t i   d u g m i e   "   +   S t r i n g . f r o m C h a r C o d e ( 0 x 2 0 3 9 )   +   " ,   "   +   S t r i n g . f r o m C h a r C o d e ( 0 x 2 0 3 a )   +   "   z a   i z b o r   m e s e c a \ n "   + 
 " -   Z a   b r~ i   i z b o r ,   d r~ a t i   p r i t i s n u t   t a s t e r   m ia a   i z n a d   b i l o   k o g   o d   p o m e n u t i h   d u g m i a " ; 
 C a l e n d a r . _ T T [ " A B O U T _ T I M E " ]   =   " \ n \ n "   + 
 " I z b o r   v r e m e n a : \ n "   + 
 " -   K l i k t a j   n a   s a t e   i l i   m i n u t e   p o v e a v a   n j i h o v e   v r e d n o s t i \ n "   + 
 " -   S h i f t - k l i k   s m a n j u j e   n j i h o v e   v r e d n o s t i \ n "   + 
 " -   k l i k n i   i   v u c i   z a   b r~ i   i z b o r . " ; 
 
 C a l e n d a r . _ T T [ " P R E V _ Y E A R " ]   =   " P r e t h o d n a   g o d i n a   ( d u g i   p r i t i s a k   z a   m e n i ) " ; 
 C a l e n d a r . _ T T [ " P R E V _ M O N T H " ]   =   " P r e t h o d n i   m e s e c   ( d u g i   p r i t i s a k   z a   m e n i ) " ; 
 C a l e n d a r . _ T T [ " G O _ T O D A Y " ]   =   " I d i   n a   d a n aa n j i   d a n " ; 
 C a l e n d a r . _ T T [ " N E X T _ M O N T H " ]   =   " S l e d e i   m e s e c   ( d u g i   p r i t i s a k   z a   m e n i ) " ; 
 C a l e n d a r . _ T T [ " N E X T _ Y E A R " ]   =   " S l e d e a   g o d i n a   ( d u g i   p r i t i s a k   z a   m e n i ) " ; 
 C a l e n d a r . _ T T [ " S E L _ D A T E " ]   =   " I z a b e r i   d a t u m " ; 
 C a l e n d a r . _ T T [ " D R A G _ T O _ M O V E " ]   =   " P r i t i s n i   i   v u c i   z a   p r o m e n u   p o z i c i j e " ; 
 C a l e n d a r . _ T T [ " P A R T _ T O D A Y " ]   =   "   ( d a n a s ) " ; 
 
 / /   C h o o s e   f i r s t   d a y   o f   w e e k . 
 C a l e n d a r . _ T T [ " D A Y _ F I R S T " ]   =   " % s   k a o   p r v i   d a n   u   n e d e l j i " ;   
 C a l e n d a r . _ T T [ " M O N _ F I R S T " ]   =   " P r i k a~ i   p o n e d e l j a k   k a o   p r v i   d a n   n e d e l j e " ; 
 C a l e n d a r . _ T T [ " S U N _ F I R S T " ]   =   " P r i k a~ i   n e d e l j u   k a o   p r v i   d a n   n e d e l j e " ;  
 
 / /   W e e k e n d   i s   u s u a l :   S u n d a y   ( 0 )   a n d   S a t u r d a y   ( 6 ) . 
 C a l e n d a r . _ T T [ " W E E K E N D " ]   =   " 0 , 6 " ; 
 
 C a l e n d a r . _ T T [ " C L O S E " ]   =   " Z a t v o r i " ; 
 C a l e n d a r . _ T T [ " T O D A Y " ]   =   " D a n a s " ; 
 C a l e n d a r . _ T T [ " T I M E _ P A R T " ]   =   " ( S h i f t - ) k l i k n i   i   v u c i   z a   p r o m e n u   v r e d n o s t i " ; 
 
 / /   d a t e   f o r m a t s 
 C a l e n d a r . _ T T [ " D E F _ D A T E _ F O R M A T " ]   =   " % d - % m - % Y " ; 
 C a l e n d a r . _ T T [ " T T _ D A T E _ F O R M A T " ]   =   " % A ,   % B   % e " ; 
 
 C a l e n d a r . _ T T [ " W K " ]   =   " w k " ; 
 C a l e n d a r . _ T T [ " T I M E " ]   =   " T i m e : " ; 
