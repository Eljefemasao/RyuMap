

from django.urls import path
from . import views 

urlpatterns = [
    #path('', views.)
    path('', views.index, name='index')
]
